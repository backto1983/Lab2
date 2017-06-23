    <?php

        require_once('header.php');

        //get the search term(s)
        $searchTerms = $_GET['searchTerms'];

        //split this into a list based on the spaces between each word
        $searchTerms = explode(' ', $searchTerms);

        //start the sql
        //can add connection here
        require_once('db.php');
        $sql = "SELECT * FROM racers WHERE ";
        $where = "";
        $counter = 0;

        foreach($searchTerms as $searchTerm) {
            $sql .= " racerName LIKE ?";
            $searchTerms[$counter] = "%" . $searchTerm . "%";
            $counter++;

            if ($counter < sizeof($searchTerms)) {
                $sql .= " OR ";
            }

            $sqlSearchTerms = array();

            foreach ($searchTerms as $searchTerm) {
                $sqlSearchTerms[] = $searchTerm;
                $sqlSearchTerms[] = $searchTerm;
                $sqlSearchTerms[] = $searchTerm;
            }
        }

        $sql = $sql . $where;

        $cmd = $conn->prepare($sql);
        $cmd->execute($searchTerms);
        $racers = $cmd->fetchAll();

        echo '<table border="1"><tr>
              <td>Racer Name</td>
              <td>Age</td>
              <td>Sex</td>
              <td>Phone</td></tr>';

        foreach ($racers as $racer) {
            echo '<tr><td>' . $racer['racerName'] . '</td>
            <td>' . $racer['age'] . '</td>
            <td>' . $racer['sex'] . '</td>
            <td>' . $racer['phoneNum'] . '</td></tr>';

        }

        echo '</table>';
        $conn = null;
    ?>
    </body>
</html>
