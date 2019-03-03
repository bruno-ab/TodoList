@include('header')
<!doctype html>

    <body>
            <form method="POST" action="/addtask">
             
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group"> <!-- Name field -->
                <label class="control-label " for="name">Tarefa</label>
                <input class="form-control" id="name" name="name" type="text"/>
            </div>
                
            <div class="form-group"> <!-- Message field -->
                <label class="control-label " for="description">Descrição da Tarefa</label>
                <textarea class="form-control" cols="40" id="description" name="description" rows="10"></textarea>
            </div>

            <div class="form-group">
                    <label class="control-label " for="date">Data</label>   
                    <input type="text" class="form-control item" id="date" name="date" placeholder="Ex. 18/12/2019">
                </div> 
            
            <div class="form-group">
                
                <button class="btn btn-primary " name="submit" type="submit">Adicionar</button>
            </div>
	
        </form>								
		
    </body>
</html>
