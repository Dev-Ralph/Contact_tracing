<?php
class viewOnly extends config{
  public $search;
  public $filter;

    public function __construct($search= NULL,$filter=NULL){
      $this->search = $search;
      $this->filter = $filter;
    }
    public function viewUsers(){
        $url = basename($_SERVER['SCRIPT_FILENAME']);
        $con = $this->con();
        $sql = "SELECT * FROM `user_tbl` WHERE 1";
        $data =$con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        // pagination
         $limit = 10;
         if (!isset($_GET['page'])) {
               $page = 1;
           } else{
               $page = $_GET['page'];
         }

         $start = ($page-1)*$limit;

         $total_results = $data->rowCount();
         $total_pages = ceil($total_results/$limit);

         $sql2 = "SELECT * FROM `user_tbl` WHERE 1 ORDER BY `user_id` DESC LIMIT $start,$limit";
         $data2 = $con->prepare($sql2);
         $data2->execute();
         $result2 = $data2->fetchAll(PDO::FETCH_ASSOC);
         $pageResults = $data2->rowCount();
        // pagination ends here


        echo "<table style='width:100%' class='table text-center'>";
        echo "
        <thead>
        <tr>
        <th>Card ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Status</th>
        <th>Quarantine</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>";
        foreach ($result2  as $res){
            echo "<tr>";
            echo "<td style='text-align: center'>$res[card_id]</td>";
            echo "<td style='text-align: center'>$res[user_Fname]</td>";
            echo "<td style='text-align: center'>$res[user_Lname]</td>";
            echo "<td style='text-align: center'>$res[user_Email]</td>";
            echo "<td style='text-align: center'>$res[user_Address]</td>";
            echo "<td style='text-align: center'>$res[user_Cnumber]</td>";
            echo "<td style='text-align: center'>$res[healthStatus]</td>";
            echo "<td style='text-align: center'>$res[quarantine_date]</td>";
            if($res['healthStatus'] == "NEGATIVE"){
              echo "<td style='text-align: center'><a class='btn btn-danger' href='update_user.php?positive=$res[card_id]'>Positive</a></td>";
            }else{
              echo "<td style='text-align: center'><a class='btn btn-secondary' href='update_user.php?positive=$res[card_id]' style='pointer-events: none;
              cursor: default;'>Positive</a></td>";
            }
            echo "</tr>";
          }
          echo "
          </tbody>
          </table>
          ";
          echo '<div class = "container text-center mb-3 mt-2">';
           if (isset($_GET['page'])) {
             if ($_GET['page'] == 1) {
               echo '<strong>Displaying '.$pageResults.' of '.$total_results.' Results</strong>';
             }else if($_GET['page'] > 1){
               $thispage =  $_GET['page'];
               $x = $limit*$thispage;
               $y = $x - $limit;
               $total = $y + $pageResults;
               echo '<strong>Displaying '.$total.' of '.$total_results.' Results</strong>';
             }
           }else {
             echo '<strong>Displaying '.$pageResults.' of '.$total_results.' Results</strong>';
           }
           echo '</div>';

           echo '<div class="container">';
           $pagination = new pagination($total_pages,$page,$url);
           $pagination->paginationAll();
           echo '</div>';
      }

      public function searchUsers(){
        $con = $this->con();
        $sql = "SELECT * FROM `user_tbl` WHERE `$this->filter` LIKE '$this->search%'";
        $data =$con->prepare($sql);
        $data->execute();
        $results = $data->fetchAll(PDO::FETCH_ASSOC);

        // pagination
        $limit = 1;
        if (!isset($_GET['Spage'])) {
              $page = 1;
          } else{
              $page = $_GET['Spage'];
        }

        $start = ($page-1)*$limit;

        $total_results = $data->rowCount();
        $total_pages = ceil($total_results/$limit);
        // pagination ends here

        $sql2 = "SELECT * FROM `user_tbl` WHERE `$this->filter` LIKE '$this->search%' LIMIT $start,$limit";
        $data2 =$con->prepare($sql2);
        $data2->execute();
        $results2 = $data2->fetchAll(PDO::FETCH_ASSOC);
        $pageResults = $data2->rowCount();

        $count=$data2->rowCount();

        echo "<table style='width:100%' class='table text-center'>";
        echo "
        <thead>
        <tr>
        <th>Card ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Status</th>
        <th>Quarantine</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>";

        if ($count>=1) {
          foreach ($results2  as $result){
              echo "<tr>";
              echo "<td style='text-align: center'>$result[card_id]</td>";
              echo "<td style='text-align: center'>$result[user_Fname]</td>";
              echo "<td style='text-align: center'>$result[user_Lname]</td>";
              echo "<td style='text-align: center'>$result[user_Email]</td>";
              echo "<td style='text-align: center'>$result[user_Address]</td>";
              echo "<td style='text-align: center'>$result[user_Cnumber]</td>";
              echo "<td style='text-align: center'>$result[healthStatus]</td>";
              echo "<td style='text-align: center'>$result[quarantine_date]</td>";
              if($res['healthStatus'] == "NEGATIVE"){
              echo "<td style='text-align: center'><a class='btn btn-danger' href='update_user.php?positive=$res[card_id]'>Positive</a></td>";
            }else{
              echo "<td style='text-align: center'><a class='btn btn-secondary' href='update_user.php?positive=$res[card_id]' style='pointer-events: none;
              cursor: default;'>Positive</a></td>";
            }
              echo "</tr>";
            }
            echo "
            </tbody>
            </table>
            ";
            echo '<div class = "container text-center mb-3 mt-2">';
             if (isset($_GET['Spage'])) {
               if ($_GET['Spage'] == 1) {
                 echo '<strong>Displaying '.$pageResults.' of '.$total_results.' Results</strong>';
               }else if($_GET['Spage'] > 1){
                 $thispage =  $_GET['Spage'];
                 $x = $limit*$thispage;
                 $y = $x - $limit;
                 $total = $y + $pageResults;
                 echo '<strong>Displaying '.$total.' of '.$total_results.' Results</strong>';
               }
             }else {
               echo '<strong>Displaying '.$pageResults.' of '.$total_results.' Results</strong>';
             }
             echo '</div>';
        }else {
          echo "
            </tbody>
            </table>
          ";
          echo '<center>No Results Found</center>';
        }

        $keyword = $this->search;
        $filter = $this->filter;

        echo '<div class="container">';
        $pagination = new paginationSearch;
        $pagination->paginationSearchUser($total_pages,$page,$keyword,$filter);
        echo '</div>';
      }

      public function viewLogs(){
        $url = basename($_SERVER['SCRIPT_FILENAME']);
        $con = $this->con();
        $sql = "SELECT * FROM `transaction_tbl` WHERE 1";
        $data =$con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        // pagination
         $limit = 10;
         if (!isset($_GET['page'])) {
               $page = 1;
           } else{
               $page = $_GET['page'];
         }

         $start = ($page-1)*$limit;

         $total_results = $data->rowCount();
         $total_pages = ceil($total_results/$limit);
         // pagination ends here

         $sql2 = "SELECT * FROM `transaction_tbl` WHERE 1 ORDER BY `id` DESC LIMIT $start,$limit";
         $data2 = $con->prepare($sql2);
         $data2->execute();
         $result2 = $data2->fetchAll(PDO::FETCH_ASSOC);
         $pageResults = $data2->rowCount();
        // pagination ends here
        echo "<table style='width:100%' class='table text-center'>";
        echo "
        <thead>
        <tr>
        <th>Card ID</th>
        <th>Time In</th>
        <th>Time Out</th>
        <th>Establishment</th>
        <th>Status</th>
        </tr>
        </thead>
        <tbody>";
        foreach ($result2  as $res){
            echo "<tr>";
            echo "<td style='text-align: center'>$res[card_id]</td>";
            echo "<td style='text-align: center'>$res[in_time]</td>";
            echo "<td style='text-align: center'>$res[out_time]</td>";
            echo "<td style='text-align: center'>$res[est_name]</td>";
            echo "<td style='text-align: center'>$res[transact_status]</td>";
            echo "</tr>";
          }
          echo "
          </tbody>
          </table>
          ";

          echo '<div class = "container text-center mb-3 mt-2">';
           if (isset($_GET['page'])) {
             if ($_GET['page'] == 1) {
               echo '<strong>Displaying '.$pageResults.' of '.$total_results.' Results</strong>';
             }else if($_GET['page'] > 1){
               $thispage =  $_GET['page'];
               $x = $limit*$thispage;
               $y = $x - $limit;
               $total = $y + $pageResults;
               echo '<strong>Displaying '.$total.' of '.$total_results.' Results</strong>';
             }
           }else {
             echo '<strong>Displaying '.$pageResults.' of '.$total_results.' Results</strong>';
           }
           echo '</div>';

           echo '<div class="container">';
           $pagination = new pagination($total_pages,$page,$url);
           $pagination->paginationAll();
           echo '</div>';
      }


      public function searchLogs(){
        $con = $this->con();
        $sql = "SELECT * FROM `transaction_tbl` WHERE `$this->filter` LIKE '$this->search%'";
        $data =$con->prepare($sql);
        $data->execute();
        $results = $data->fetchAll(PDO::FETCH_ASSOC);

        // pagination
        $limit = 1;
        if (!isset($_GET['Spage'])) {
              $page = 1;
          } else{
              $page = $_GET['Spage'];
        }

        $start = ($page-1)*$limit;

        $total_results = $data->rowCount();
        $total_pages = ceil($total_results/$limit);
        // pagination ends here


        $sql2 = "SELECT * FROM `transaction_tbl` WHERE `$this->filter` LIKE '$this->search%' LIMIT $start,$limit";
        $data2 =$con->prepare($sql2);
        $data2->execute();
        $results2 = $data2->fetchAll(PDO::FETCH_ASSOC);
        $pageResults = $data2->rowCount();

        $count=$data2->rowCount();

        echo "<table style='width:100%' class='table text-center'>";
        echo "
        <thead>
        <tr>
        <th>Card ID</th>
        <th>Time In</th>
        <th>Time Out</th>
        <th>Establishment</th>
        <th>Status</th>
        </tr>
        </thead>
        <tbody>";

        if ($count>=1) {
          foreach ($results2 as $res){
              echo "<tr>";
              echo "<td style='text-align: center'>$res[card_id]</td>";
              echo "<td style='text-align: center'>$res[in_time]</td>";
              echo "<td style='text-align: center'>$res[out_time]</td>";
              echo "<td style='text-align: center'>$res[est_name]</td>";
              echo "<td style='text-align: center'>$res[transact_status]</td>";
              echo "</tr>";
            }
            echo "
              </tbody>
              </table>
            ";
            echo '<div class = "container text-center mb-3 mt-2">';
             if (isset($_GET['Spage'])) {
               if ($_GET['Spage'] == 1) {
                 echo '<strong>Displaying '.$pageResults.' of '.$total_results.' Results</strong>';
               }else if($_GET['Spage'] > 1){
                 $thispage =  $_GET['Spage'];
                 $x = $limit*$thispage;
                 $y = $x - $limit;
                 $total = $y + $pageResults;
                 echo '<strong>Displaying '.$total.' of '.$total_results.' Results</strong>';
               }
             }else {
               echo '<strong>Displaying '.$pageResults.' of '.$total_results.' Results</strong>';
             }
             echo '</div>';
        }else {
          echo "
            </tbody>
            </table>
          ";
          echo '<center>No Results Found</center>';
        }

        $keyword = $this->search;
        $filter = $this->filter;

        echo '<div class="container">';
        $pagination = new paginationSearch;
        $pagination->paginationSearchLogs($total_pages,$page,$keyword,$filter);
        echo '</div>';
      }
}
?>
