import Dashboard from './components/Dashboard.vue';
import ListAppointments from './pages/appointments/ListAppointments.vue';
import ListUsers from './pages/users/ListUsers.vue';

export default [
    {
        path:'/admin/dashboard',
        name:'admin.dashboard',
        component:Dashboard,
    },
    {
        path:'/admin/appointments',
        name:'admin.appointments',
        component:ListAppointments,
    },
    {
        path:'/admin/users',
        name:'admin.users',
        component:ListUsers,
    },
    
]

/* All routes of component of page are bounded here and define their routes. */