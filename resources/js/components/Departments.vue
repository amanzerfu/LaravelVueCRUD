<template>
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <h5 class="float-start text-light">Departments List</h5>
                <button class="btn btn-success float-end" @click="createDepartments"> Create Department </button>
            </div>
            <div class="card-body">
<div class="table-responsive">
  <table class="table hover txt-center">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Departments</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(department, index) in departments" :key="index">
        <td>{{index+1}}</td>
        <td>{{department.name}}</td>
        <td>{{department.department_id }}</td>
        <td><button class="btn btn-success float-end mx-1" @click="editDepartment(department)"> <i class="fa fa-edit"></i> </button>
          <!-- <button class="btn btn-danger float-end mx-1" @click="deleteDepartment(department)"> <i class="fa fa-trash"></i> </button> -->
        </td>
      </tr>
    </tbody>
  </table>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">
      {{!editMode ? 'Create Department':'Update Department'}}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
    <div class="row">
<div class="col-md-6">
   <div class="form-group">
    <label for="name">Name </label>
    <input type="text" class="form-control" name="name" v-model="departmentData.name">
</div>
</div>
<div class="col-md-6">
   <div class="form-group">
    <label for="department_id">Director </label>
    <select name="department_id" class="form-control" v-model="departmentData.department_id">
        <option value="" >Select Department</option>
        <option value="1">IT Department</option>
        <option value="2">HR Department</option>
    </select>
</div>
  </div>
  </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success" @click="!editMode? storeDepartment() :updateDepartment()">Save changes</button>
  </div>
</div>
</div>
</div>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
import { then } from 'laravel-mix';

export default{
    data() {
        return {
      editMode :false,
      departmentData: {
        id:'',
        name: '',
        department_id: '',
      },
      departments:{},

        }
    },
    methods: {
      // deleteDepartment(department)
      // {
      //   if(confirm('Are you sure you wanna Delete?'))
      // {
      //   axios.post(window.url+'api/deleteDepartments/'+department.id)
      //   .then(response => {
      //     console.log(response);
      //     this.getDepartments();
          
      //   });
      // }
      // },
      updateDepartment() {
        axios.post(window.url+'api/updateDepartments/'+this.departmentData.id, this.departmentData)
        .then(response => {
          console.log(response.data);
          this.getDepartments();
          $('#exampleModal').modal('hide'); // Close the modal after successful submission
        })
        .catch(error => {
          console.error('Error storing department:', error);
        });
      },
      editDepartment(department) {
        this.editMode=true
        this.departmentData.id = department.id
        this.departmentData.name=department.name
        this.departmentData.department_id = department.department_id
   $('#exampleModal').modal('show');
      },
      getDepartments() {
        axios.get(`${window.url}api/getDepartments`)
        .then((response) =>{
          // console.log(response.data);
          this.departments =response.data;
        })
      },
      createDepartments()
        {
          this.editMode=false
          // this.departmentData.name = this.departmentData.department_id = ''
        $('#exampleModal').modal('show');
        },
        storeDepartment() {
        
      axios.post(window.url+'api/storeDepartment', this.departmentData)
        .then(response => {
          console.log(response.data);
          this.getDepartments();
          $('#exampleModal').modal('hide'); // Close the modal after successful submission
        })
        .catch(error => {
          console.error('Error storing department:', error);
        });
    },
    
    },
    mounted () {
this.getDepartments();
    },


}</script>