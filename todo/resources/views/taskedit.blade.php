@include('header')
<!doctype html>

    <body>
            <form method="POST" action="/updatetask">
             
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id" name="id" value= "{{$task->id}}">

            <div class="form-group"> <!-- Name field -->
                <label class="control-label " for="name">Tarefa</label>
                <input class="form-control" id="name" name="name" type="text" placeholder="{{$task->name}}"/>
            </div>
                
            <div class="form-group"> <!-- Message field -->
                <label class="control-label " for="description">Descrição da Tarefa</label>
                <textarea class="form-control" cols="40" id="description" name="description" rows="10" placeholder= "{{$task->description}}"></textarea>
            </div>

            <div class="form-group">
                    <label class="control-label " for="date">Data</label>   
                    <input type="text" class="form-control item" id="date" name="date" placeholder= "{{$task->date}}">
                </div> 
            
            <div class="form-group">
                
                <button class="btn btn-primary " name="submit" type="submit">Atualizar</button>
            </div>
	
        </form>								
		
    </body>
</html>
