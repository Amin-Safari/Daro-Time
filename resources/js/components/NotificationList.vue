<template>
    <div class="notification-list">
        <div class="notification-header">
            <h5>اعلان‌ها</h5>
            <button class="btn btn-sm btn-outline-secondary" @click="markAllAsRead">
                علامت‌گذاری همه به عنوان خوانده شده
            </button>
        </div>
        
        <div class="notification-items">
            <div v-for="notification in notifications" 
                 :key="notification.id" 
                 class="notification-item"
                 :class="{ 'unread': !notification.read_at }">
                <div class="notification-content">
                    <p>{{ notification.data.message }}</p>
                    <small>{{ formatDate(notification.created_at) }}</small>
                </div>
                <button class="btn btn-sm btn-link" 
                        @click="markAsRead(notification.id)"
                        v-if="!notification.read_at">
                    علامت‌گذاری به عنوان خوانده شده
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            notifications: []
        }
    },
    
    mounted() {
        this.loadNotifications();
        this.subscribeToNotifications();
    },
    
    methods: {
        async loadNotifications() {
            try {
                const response = await axios.get('/notifications');
                this.notifications = response.data;
            } catch (error) {
                console.error('Error loading notifications:', error);
            }
        },
        
        async markAsRead(notificationId) {
            try {
                await axios.post(`/notifications/${notificationId}/mark-as-read`);
                this.loadNotifications();
            } catch (error) {
                console.error('Error marking notification as read:', error);
            }
        },
        
        async markAllAsRead() {
            try {
                await axios.post('/notifications/mark-all-as-read');
                this.loadNotifications();
            } catch (error) {
                console.error('Error marking all notifications as read:', error);
            }
        },
        
        async subscribeToNotifications() {
            try {
                const permission = await Notification.requestPermission();
                if (permission === 'granted') {
                    const registration = await navigator.serviceWorker.ready;
                    const subscription = await registration.pushManager.subscribe({
                        userVisibleOnly: true,
                        applicationServerKey: 'YOUR_VAPID_PUBLIC_KEY'
                    });
                    
                    await axios.post('/notifications/subscribe', {
                        subscription: subscription.toJSON()
                    });
                }
            } catch (error) {
                console.error('Error subscribing to notifications:', error);
            }
        },
        
        formatDate(date) {
            return new Date(date).toLocaleDateString('fa-IR', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }
    }
}
</script>

<style scoped>
.notification-list {
    max-width: 600px;
    margin: 0 auto;
}

.notification-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.notification-items {
    max-height: 400px;
    overflow-y: auto;
}

.notification-item {
    padding: 1rem;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notification-item.unread {
    background-color: #f8f9fa;
}

.notification-content {
    flex: 1;
}

.notification-content p {
    margin-bottom: 0.5rem;
}

.notification-content small {
    color: #6c757d;
}
</style> 