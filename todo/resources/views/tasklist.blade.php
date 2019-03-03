@include('header')
<!doctype html>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
 
  
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Tarefa </td>
          <td>Descrição </td>
          <td>Data </td>
          
          
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->name}}</td>
            <td>{{$task->description}}</td>
            <td>{{$task->date}}</td>
          
            <td><a href="/edittask/{{$task->id}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="/deletetask/{{$task->id}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  @if(empty($message))
  @else
  <div class="alert alert-success" role="alert">
      echo $message;
  </div>
   @endif



<div>
  </html>
