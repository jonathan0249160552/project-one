<div class="">
        <style>
            body {
    margin: 0 0 55px 0;
}

.nav {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 55px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    background-color: white;
    display: flex;
    overflow-x: auto;
    /* box-shadow: 0 2px 4px 0 rgba(0,0,0,.2); */
    /* shadow: 2px 2px 5px red; */
}

.nav__link {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 13px;
    color: #444444;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
    text-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
    /* text-shadow: 2px 2px 4px #000000; */
}

.nav__link:hover {
    background-color: #eeeeee;
}

.nav__link--active {
    background-color: #eeeeee;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
    text-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
   /* text-shadow: 2px 2px 4px #000000; */
}

.nav__icon {
    font-size: 19.6px;
    color: black;
    
}


        </style>
      
    <nav class="nav myShadow my-auto ">
    <div class="">
    
    </div>
      <a href="home.php" class="nav__link nav__link--active">
        <i class="material-icons nav__icon">dashboard</i>
        <span class="nav__text">Dashboard</span>
      </a>
      <a href="post.php" class="nav__link ">
        <i class="material-icons nav__icon">book</i>
        <span class="nav__text">Academia</span>
      </a>
      <a href="blog.php" class="nav__link">
        <i class="material-icons nav__icon">web</i>
        <span class="nav__text">News</span>
      </a>
      
   
    </nav>
    </div> 
