<div class="sidebar" id="sidebar">
    <ul>
        <li><a href="#">Menu 1</a></li>
        <li><a href="#">Menu 2</a></li>
        <li><a href="#">Menu 3</a></li>
        <li><a href="#">Menu 4</a></li>
    </ul>
</div>

<style>
    .sidebar {
        width: 20%;
        background-color: #f1f1f1;
    }
    .sidebar ul{
        list-style-type: none;
        padding: 2%;
    }
    .sidebar li {
        margin-bottom: 1%;
    }
    .sidebar a {
        display: block;
        text-decoration: none;
        color: #333;
        font-size: 2vw;
        white-space: nowrap;
        margin-bottom: 2vw;
    }
    @media(max-width: 768px){
        .sidebar{
            width: 100%;
        }
        .sidebar ul{
            padding: 2%;
        }
        .sidebar li{
            margin-bottom: 2%;
        }
    }
</style>