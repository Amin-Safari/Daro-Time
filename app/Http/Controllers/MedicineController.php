<?php
namespace App\Http\Controllers;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class MedicineController extends Controller
{
    public function index() {  
        // Get all active drugs for the authenticated user
        $drugs = Medicine::where('user_id', auth()->id())->get();
        
        // Initialize an array for completed drugs
        $completedDrugs = [];
        // Calculate remaining time for each drug
        foreach ($drugs as $drugItem) {
            $currentTime = Carbon::now();
            $startTime = Carbon::parse($drugItem->start_date . ' ' . $drugItem->start_time);
            $totalDoses = $drugItem->dosage;
            $frequency = $drugItem->frequency;
            // Calculate next dose time
            $nextDoseTime = $startTime->addMinutes($frequency * ($totalDoses - $drugItem->remaining_dose));
            // Calculate remaining time until the next dose
            $remainingTime = $nextDoseTime->diffInMinutes($currentTime);
            $drugItem->remaining_time = $remainingTime > 0 ? $remainingTime : 0;
            // Check if the drug is completed
            if ($drugItem->remaining_dose <= 0) {
                $completedDrugs[] = $drugItem; // Add to completed drugs
            }
        }
        // Filter out completed drugs from the active drugs list
        $drugs = $drugs->reject(function ($drug) {
            return $drug->remaining_dose <= 0;
        });
        return view('dashboard', compact('drugs', 'completedDrugs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'medicine_name' => 'required',
            'dosage' => 'required|numeric',
            'reminder_type' => 'required|in:email,sms,call,notification',
            'frequency' => 'required|numeric',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
        ]);
        $dt=$request->start_date .' '. $request->start_time;
        Medicine::create([
            'name' => $request->medicine_name,
            'dosage' => $request->dosage,
            'remaining_dose'=> $request->dosage,
            'reminder_type' => $request->reminder_type,
            'frequency' => $request->frequency,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'user_id' => auth()->id(), // Add user ID
            'last_reminder'=> $dt,
        ]);
        return response()->json(['success' => true]);
    }
    public function getActiveDrugs()
    {
        $drugs = Medicine::where('user_id', auth()->id())->get();
        return response()->json($drugs);
    }
    public function update(Request $request, $id)
    {
        $drug = Medicine::find($id);
        $drug->remaining_dose = $request->remaining_dose;
        $drug->save();
        return response()->json(['success' => true]);
    }
    public function destroy($id)
    {
        $drug = Medicine::find($id);
        $drug->delete();
        return response()->json(['success' => true]);
    }
}