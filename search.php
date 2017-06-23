<html>
    <body>
    <?php

        require_once('header.php');

        if (!empty($_GET['searchTerms']))
            $searchTerms = $_GET['searchTerms'];
        else
            $searchTerms = null;
    ?>
    <form action="search-results.php" >
        <div class="form-group">
            <label>Keywords</label>
            <input name="searchTerms"/>
        </div>
        <button>Search</button>
        </form>
    </body>
</html>
