/* Vue Component of use Here for data fetching of API OF LARAVEL  */
<script>
/* import axios from 'axios';
import { ref, onMounted, reactive } from 'vue';

const users = ref([]);

const form = reactive({
        name:'',
        email:'',
        password:'',
});

const getUsers = () => {
    axios.get('/api/users')
    .then((response) => {
        users.value = response.data;
    })
}

const postUserData = () =>{
            axios.post('/api/users',form)
        .then(res=>{
            this.users.unshift(res.data);
            clearForm();
            $('#createUserModal').modal('hide');
        })
        .catch(error=>{
            console.log(error);
        })
}

onMounted(() => {
    getUsers();
}); */
import axios from 'axios';
import { ref } from 'vue';

export default {
  data() {
    return {
      users: [],
      createUsers:{
        name:'',
        email:'',
        password:'',

      }
    };
  },
  mounted() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      axios.get('/api/users')
        .then((response) => {
          this.users = response.data;
        })
        .catch((error) => {
          console.error('Error fetching users:', error);
        });
    },
    postUserData(){
        axios.post('/api/users',this.createUsers)
        .then(res=>{
            this.users.unshift(res.data);
            this.clearForm();
            $('#createUserModal').modal('hide');
        })
        .catch(error=>{
            console.log(error);
        })
    },
    clearForm(){
        this.createUsers={
                name:'',
                email:'',
                password:'',
     };
    },
    updateUser(){
        
    },
    deleteUser(id){
        axios.delete('api/user/' + id)
        .then(res=>{
            console.log(res);
        })
        .catch(error=>{
            console.log(error);
        })
    }
  }
};
</script>

<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
        <button type="button" class="mb-2 btn btn-primary" data-toggle="modal" data-target="#createUserModal">
                Add New User
            </button>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered Date</th>
                                <th>Role</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- View data looping Here -->
                            <tr v-for="(user, index) in users" :key="user.id">
                                <td>{{ index + 1 }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                            <a href="#" class="btn btn-outline-info"><i class="fas fa-eye"></i> </a> 
                            
                            <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i> </a>

                            <a href="#" @click="deleteUser(user.id)" class="btn btn-outline-danger"><i class="fas fa-trash"></i> </a>
                            </div>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal of Create User Start -->
            <div class="modal fade show" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-modal="true" style="padding-right: 16px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" v-model="createUsers.name" class="form-control username" id="username" placeholder="Enter your username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" v-model="createUsers.email" class="form-control username" id="email" placeholder="email (e.g. example@gmail.com)">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input v-model="createUsers.password" type="password" class="form-control password" id="password" placeholder="Enter your password">
        </div>
        <button type="submit" @click.prevent="postUserData" class="btn btn-primary btn-block">Login</button>
        </form>

      </div>
      <div class="modal-footer">
          <p class="mr-auto">Don't have an account? <a href="#">Sign up</a></p>
          <button type="button" class="btn btn-secondary" @click="clearForm" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
            <!-- Modal of Create User End-->

        </div>
    </div>
</template>

/* This File will be exported to route file where all routes are defined */