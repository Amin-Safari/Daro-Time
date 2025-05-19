<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class DrugController extends Controller
{
    public function index()
    {
        $completedDrugs = Drug::where('remaining_dose', 0)
            ->orderBy('last_reminder', 'desc')
            ->get();

        return view('dashboard', compact('completedDrugs'));
    }

    public function getActiveDrugs()
    {
        $activeDrugs = Drug::where('remaining_dose', '>', 0)
            ->orderBy('last_reminder', 'asc')
            ->get()
            ->map(function ($drug) {
                return [
                    'id' => $drug->id,
                    'name' => $drug->name,
                    'dosage' => $drug->dosage,
                    'remaining_dose' => $drug->remaining_dose,
                    'frequency' => $drug->frequency,
                    'last_reminder' => $drug->last_reminder,
                    'reminder_type' => $drug->reminder_type
                ];
            });

        return response()->json($activeDrugs);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medicine_name' => 'required|string|max:255',
            'dosage' => 'required|integer|min:1',
            'frequency' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'reminder_type' => 'required|in:email,sms,notification'
        ]);

        $drug = Drug::create([
            'name' => $validated['medicine_name'],
            'dosage' => $validated['dosage'],
            'remaining_dose' => $validated['dosage'],
            'frequency' => $validated['frequency'],
            'start_date' => $validated['start_date'],
            'start_time' => $validated['start_time'],
            'last_reminder' => Carbon::parse($validated['start_date'] . ' ' . $validated['start_time']),
            'reminder_type' => $validated['reminder_type']
        ]);

        return response()->json(['message' => 'دارو با موفقیت اضافه شد', 'drug' => $drug]);
    }

    public function show(Drug $drug)
    {
        return response()->json($drug);
    }

    public function update(Request $request, Drug $drug)
    {
        $validated = $request->validate([
            'medicine_name' => 'required|string|max:255',
            'remaining_dose' => 'required|integer|min:0',
            'frequency' => 'required|integer|min:1',
            'reminder_type' => 'required|in:email,sms,notification'
        ]);

        $drug->update($validated);

        return response()->json(['message' => 'اطلاعات دارو با موفقیت بروزرسانی شد']);
    }

    public function destroy(Drug $drug)
    {
        $drug->delete();
        return response()->json(['message' => 'دارو با موفقیت حذف شد']);
    }

    public function sendReminder(Request $request)
    {
        $drug = Drug::findOrFail($request->drug_id);

        // بروزرسانی زمان آخرین یادآوری
        $drug->update([
            'last_reminder' => now()
        ]);

        // ارسال یادآوری بر اساس نوع انتخاب شده
        switch ($drug->reminder_type) {
            case 'email':
                Mail::to(auth()->user()->email)->send(new \App\Mail\DrugReminder($drug));
                break;
            case 'sms':
                // ارسال پیامک
                break;
            case 'notification':
                // ارسال اعلان
                break;
        }

        return response()->json(['message' => 'یادآوری با موفقیت ارسال شد']);
    }
}
