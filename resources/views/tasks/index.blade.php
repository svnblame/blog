<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tasks Manager</title>
    </head>
    <body>
        <h3>Current Tasks</h3>
        @if (count($tasks) > 0)
        <ul>
            @foreach ( $tasks as $task )
                <li>
                    <a href='/tasks/{{ $task->id }}'>{{ $task->body }}</a>
                </li>
            @endforeach
        </ul>
        @else
            <p>No tasks!</p> 
        @endif
    </body>
</html>
