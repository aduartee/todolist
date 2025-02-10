<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Tarefa Criada</title>
</head>
<body>
    <h1>Uma nova tarefa foi criada!</h1>
    <p>Nome da tarefa: {{$task->name}}</p>
    <p>Descrição da tarefa: {{$task->name}}</p>
    <p>Hora de criação: {{$task->registeredAt}}</p>
</body>
</html>
