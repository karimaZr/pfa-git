@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All students</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>CNE</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Note</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($all as $key=>$row)
                    @if ($row->role == "Etudiant")      
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->email }}</td>
                      <td>{{ $row->role }}</td>
                      
                     
                    </tr>   
                    @endif
                    @endforeach 
               
                 
                  
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    
    </section>
    </div>
@endsection