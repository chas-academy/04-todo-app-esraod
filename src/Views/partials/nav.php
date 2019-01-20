<header class="header">
    <h1 id="title-for-app">todo</h1>
    <form id="create-todo" method="post" action="todos">
      <input name="title" class="new-todo" placeholder="Add something to do" autofocus>
    </form>
</header>

<section class="main">
    <form method="POST" action="todos/toggle-all">
    <input id="toggle-all" class="toggle-all" type="checkbox">
    <label for="toggle-all">Mark all as complete</label>
    </form>
</section>