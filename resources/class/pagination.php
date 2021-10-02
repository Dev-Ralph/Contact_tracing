<?php
class pagination{

  public $total_pages;
  public $page;
  public $url;

  public function __construct($total_pages=null,$page=null,$url=null){
    $this->total_pages = $total_pages;
    $this->page = $page;
    $this->url = $url;
  }

  public function paginationAll(){
      $total_pages = $this->total_pages;
      $page = $this->page;
      $url = $this->url;
      $adjacents = 2;
      $plimit = 1;
      $prev = $page - 1;
      $next = $page + 1;
      $lastpage = ceil($total_pages/$plimit);
      $lpm1 = $lastpage - 1;
      $pagination = "";

      if($lastpage >= 1)
      {
        $pagination .= '<ul class=\'pagination justify-content-xs-center\'>';
        //prev button
        if ($page > 1)
          $pagination.= '<li class="page-item"><a class ="page-link" href=\''.$url.'?page='.$prev.'\'>&laquo;</a></li>';
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
              $pagination.= '<li class="page-item"><a class="page-link" href=\''.$url.'?page='.$counter.'\'>'.$counter.'</a></li>';
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
                $pagination.= '<li class="page-item"><a class="page-link" href=\''.$url.'?page='.$counter.'\'>'.$counter.'</a></li>';
            }
            $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
            $pagination.= '<li class="page-item"><a class="page-link" href=\''.$url.'?page='.$lastpage.'\'>'.$lastpage.'</a></li>';
          }
          //in middle; hide some front and some back
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= '<li class="page-item"><a class="page-link" href=\''.$url.'?page=1\'>1</a></li>';
            $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<li class="page-item active"><a class="page-link" href="#">'.$counter.'<span class="sr-only">(current)</span></a></li>';
              else
                $pagination.= '<li class="page-item"><a class="page-link" href=\''.$url.'?page='.$counter.'\'>'.$counter.'</a></li>';
            }
            $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
            $pagination.= '<li class="page-item"><a class="page-link" href=\''.$url.'?page='.$lastpage.'\'>'.$lastpage.'</a></li>';
          }
          //close to end; only hide early pages
          else
          {
            $pagination.= '<li class="page-item"><a class="page-link" href=\''.$url.'?page=1.\'>1</a></li>';
            // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\''.$url.'?page==2\'>2</a>';
            $pagination .= '<li class="page-item disabled"><a class ="page-link" href="">...</a></li>';
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<li class="page-item active"><a class="page-link" href="#">'.$counter.'<span class="sr-only">(current)</span></a></li>';
              else
                $pagination.= '<li class="page-item"><a class="page-link" href=\''.$url.'?page='.$counter.'\'>'.$counter.'</a></li>';
            }
          }
        }
        if ($page < $counter - 1)
          $pagination.= '<li class="page-item"><a class ="page-link" href=\''.$url.'?page='.$next.'\'>&raquo;</a></li>';
        else
          $pagination.=  '<li class="page-item disabled"><a class ="page-link" href="">&raquo;</a></li>';
        $pagination.= "</ul>\n";
      }
      echo $pagination;
  }
}
?>
