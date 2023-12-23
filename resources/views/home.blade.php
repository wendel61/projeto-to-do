<x-layout>

<x-slot:btn>
    <a href="{{route('task.create')}}" class="btn btn-primary">Criar Tarefa</a>
    <a href="{{route('logout.user')}}" class="btn btn-primary">Logout</a>
</x-slot:btn>



    <section class="graph">

        <div class="graph_header">

            <h3 class="title_header">Progresso do Dia</h3>
            <div class="lineHeader"></div>
             <div class="graph_header-data">
                <img src="/assets/images/icon-prev.png" alt="">
                27 Nov
                <img src="/assets/images/icon-next.png" alt="">
             </div>
        </div>
        <div class="graph_header-subtitle">Tarefa: 3/6</div>

        <div class="graph_placeholde">

        </div>

        <div class="graph_header_tasks_left">
            <img src="/assets/images/icon-info.png" alt="">
            Restam 3 tarefas a serem realizadas
        </div>
    </section>
    <section class="list">

        <div class="list-header">
            <select name="" id="" class="list_header-select">
                <option value="1">Todas as tarefas</option>
            </select>


        </div>
        <div class="task_list">


            @foreach ($data as $task)

            <x-tasks :data=$task/>

            @endforeach




        </div>

    </section>

    <script>
        async function checkerInput(obj)
        {
            let is_done = obj.checked;
            let id = obj.dataset.id;
            let url = '{{route('checker.box')}}';

            let resultJson  =  await fetch(url,{
                    method: 'POST',
                    headers: {
                        'Content-type':'application/json',
                        'accept': 'application/json'
            },
                body: JSON.stringify({is_done, id, _token: '{{csrf_token()}}'}),
        });

            let result = await resultJson.json();
            if(result.success){
                alert('Tarefa atualizada');
            }else{
               obj.checked = !obj.checked;
            }

        }

    </script>

</x-layout>
