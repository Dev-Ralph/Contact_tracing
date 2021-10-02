<?php
class paginationSearch{

public function paginationSearchLogs($total_pages,$page,$keyword,$filter){
  $adjacents = 3;
  $plimit = 1;
  $prev = $page - 1;
  $next = $page + 1;
  $lastpage = ceil($total_pages/$plimit);
  $lpm1 = $lastpage - 1;
  $pagination = "";

  if($lastpage >= 1)
  {
    $pagination .= '<ul class=\'pagination justify-content-xs-center\'>';
    //previous button
    if ($page > 1)
      $pagination.= '<li class="page-item"><a class ="page-link" href=\'list_logs.php?search='.$keyword.'&filter='.$filter.'&submitL=Search&Spage='.$prev.'\'>&laquo;</a></li>';
    else
      $pagination.= '<li class="page-item disabled"><a class ="page-link" href="">&laquo;</a></li>';
    //pages
    if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
    {
      for ($counter = 1; $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= '<li class="page-item active"><a class="page-link" href="#">'.$counter.'<span class="sr-only">(current)</span></a></li>';
        else
          $pagination.= '<li class="page-item"><a class="page-link" href=\'list_logs.php?search='.$keyword.'&filter='.$filter.'&submitL=Search&Spage='.$counter.'\'>'.$counter.'</a></li>';
      }
    }
    elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
    {
      //close to beginning; only hide later pages
      if($page < 1 + ($adjacents * 2))
      {
        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
        {
          if ($counter == $page)
            $pagination.= '<li class="page-item active"><a class="page-link" href="#">'.$counter.'<span class="sr-only">(current)</span></a></li>';
          else
            $pagination.= '<li class="page-item"><a class="page-link" href=\'list_logs.php?search='.$keyword.'&filter='.$filter.'&submitL=Search&Spage='.$counter.'\'>'.$counter.'</a></lia>';
        }
        $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
        $pagination.= '<li class="page-item"><a class="page-link" href=\'list_logs.php?search='.$keyword.'&filter='.$filter.'&submitL=Search&Spage='.$lastpage.'\'>'.$lastpage.'</a></li>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<li class="page-item"><a class="page-link" href=\'list_logs.php?search='.$keyword.'&filter='.$filter.'&submitL=Search&Spage=1\'>1</a></li>';
        $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<li class="page-item active"><a class="page-link" href="#">'.$counter.'<span class="sr-only">(current)</span></a></li>';
          else
            $pagination.= '<li class="page-item"><a class="page-link" href=\'list_logs.php?search='.$keyword.'&filter='.$filter.'&submitL=Search&Spage='.$counter.'\'>'.$counter.'</a></li>';
        }
        $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
        $pagination.= '<li class="page-item"><a class="page-link" href=\'list_logs.php?search='.$keyword.'&filter='.$filter.'&submitL=Search&Spage='.$lastpage.'\'>'.$lastpage.'</a></li>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<li class="page-item"><a class="page-link" href=\'list_logs.php?search='.$keyword.'&filter='.$filter.'&submitL=Search&Spage=1.\'>1</a></li>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage==2\'>2</a>';
        $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<li class="page-item active"><a class="page-link" href="#">'.$counter.'<span class="sr-only">(current)</span></a></li>';
          else
            $pagination.= '<li class="page-item"><a class="page-link" href=\'list_logs.php?search='.$keyword.'&filter='.$filter.'&submitL=Search&Spage='.$counter.'\'>'.$counter.'</a></li>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<li class="page-item"><a class ="page-link" href=\'list_logs.php?search='.$keyword.'&filter='.$filter.'&submitL=Search&Spage='.$next.'\'>&raquo;</a></li>';
    else
      $pagination.=  '<li class="page-item disabled"><a class ="page-link" href="">&raquo;</a></li>';
    $pagination.= "</ul>\n";
  }
  echo $pagination;
  }

  public function paginationSearchUser($total_pages,$page,$keyword,$filter){
    $adjacents = 3;
    $plimit = 1;
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total_pages/$plimit);
    $lpm1 = $lastpage - 1;
    $pagination = "";

    if($lastpage >= 1)
    {
      $pagination .= '<ul class=\'pagination justify-content-xs-center\'>';
      //previous button
      if ($page > 1)
        $pagination.= '<li class="page-item"><a class ="page-link" href=\'list_users.php?search='.$keyword.'&filter='.$filter.'&submitU=Search&Spage='.$prev.'\'>&laquo;</a></li>';
      else
        $pagination.= '<li class="page-item disabled"><a class ="page-link" href="">&laquo;</a></li>';
      //pages
      if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
      {
        for ($counter = 1; $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<li class="page-item active"><a class="page-link" href="#">'.$counter.'<span class="sr-only">(current)</span></a></li>';
          else
            $pagination.= '<li class="page-item"><a class="page-link" href=\'list_users.php?search='.$keyword.'&filter='.$filter.'&submitU=Search&Spage='.$counter.'\'>'.$counter.'</a></li>';
        }
      }
      elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
      {
        //close to beginning; only hide later pages
        if($page < 1 + ($adjacents * 2))
        {
          for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
          {
            if ($counter == $page)
              $pagination.= '<li class="page-item active"><a class="page-link" href="#">'.$counter.'<span class="sr-only">(current)</span></a></li>';
            else
              $pagination.= '<li class="page-item"><a class="page-link" href=\'list_users.php?search='.$keyword.'&filter='.$filter.'&submitU=Search&Spage='.$counter.'\'>'.$counter.'</a></lia>';
          }
          $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
          $pagination.= '<li class="page-item"><a class="page-link" href=\'list_users.php?search='.$keyword.'&filter='.$filter.'&submitU=Search&Spage='.$lastpage.'\'>'.$lastpage.'</a></li>';
        }
        //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
          $pagination.= '<li class="page-item"><a class="page-link" href=\'list_users.php?search='.$keyword.'&filter='.$filter.'&submitU=Search&Spage=1\'>1</a></li>';
          $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
          for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<li class="page-item active"><a class="page-link" href="#">'.$counter.'<span class="sr-only">(current)</span></a></li>';
            else
              $pagination.= '<li class="page-item"><a class="page-link" href=\'list_users.php?search='.$keyword.'&filter='.$filter.'&submitU=Search&Spage='.$counter.'\'>'.$counter.'</a></li>';
          }
          $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
          $pagination.= '<li class="page-item"><a class="page-link" href=\'list_users.php?search='.$keyword.'&filter='.$filter.'&submitU=Search&Spage='.$lastpage.'\'>'.$lastpage.'</a></li>';
        }
        //close to end; only hide early pages
        else
        {
          $pagination.= '<li class="page-item"><a class="page-link" href=\'list_users.php?search='.$keyword.'&filter='.$filter.'&submitU=Search&Spage=1.\'>1</a></li>';
          // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage==2\'>2</a>';
          $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
          for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<li class="page-item active"><a class="page-link" href="#">'.$counter.'<span class="sr-only">(current)</span></a></li>';
            else
              $pagination.= '<li class="page-item"><a class="page-link" href=\'list_users.php?search='.$keyword.'&filter='.$filter.'&submitU=Search&Spage='.$counter.'\'>'.$counter.'</a></li>';
          }
        }
      }
      if ($page < $counter - 1)
        $pagination.= '<li class="page-item"><a class ="page-link" href=\'list_users.php?search='.$keyword.'&filter='.$filter.'&submitU=Search&Spage='.$next.'\'>&raquo;</a></li>';
      else
        $pagination.=  '<li class="page-item disabled"><a class ="page-link" href="">&raquo;</a></li>';
      $pagination.= "</ul>\n";
    }
    echo $pagination;
    }
}

?>
