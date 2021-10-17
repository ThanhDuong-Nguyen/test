<?php

if (!function_exists('dd')) { #Nếu không có tồn tại function dd
    function dd($array = [])
    {
        echo '<pre>';
        var_dump($array);
        echo '</pre>';
        die();
    }
}

if (!function_exists('json')) { #Nếu không có tồn tại function json
    function json($array = [])
    {
        header('Content-type: application/json');

        echo json_encode($array);
    }
}

if (!function_exists('getFolder')) {
    function getFolder($path = 'uploads')
    {
        $info = [ date("Y"), date("m"), date("d") ];

        $pathFull = $path;
        foreach ($info as $key => $value) {
            $pathFull .=  '/' . $value;
        
            if (is_dir($pathFull) === false) {
                mkdir($pathFull, 0777);
            }
        }
        return $pathFull;
    }
}

if (!function_exists('page')) {
    function page($sumPage, $page, $URL = '')
    {
        $html = '<ul class="pagination mr-4" style="justify-content: end;">';

        #Về đầu trang
        $html .= '<li class="page-item"><a  class="page-link" href="' .\App\Helpers\Helper::getFilter(['page' => 1]) . '">Đầu</a></li>';

        #Về trước 1 trang
        #Nếu trang hiện tại lớn hơn 1 => trước
        if ($page > 1) {
            $html .= '<li class="page-item"><a class="page-link" href="' . \App\Helpers\Helper::getFilter(['page' => ($page - 1)]) . '">Trước</a></li>';
        }

        #Nếu trang hiện tại - 2 <= 0(Đã hết trang để hiển thị) => 1
        #ngược lại thì chính nó
        $start = ($page - 2) <= 0 ? 1 : ($page - 2);

        #Nếu trang hiện tại + 2 >= tổng số trang => tổng số trang
        #ngược lại thì chính nó
        $end   = ($page + 2) >= $sumPage ? $sumPage : ($page + 2);

        for ($i = $start; $i <= $end; $i++) {
            if ($page == $i) {
                $html .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
            } else {
                $html .= '<li class="page-item"><a class="page-link" href="' . \App\Helpers\Helper::getFilter(['page' => $i]) . '">' . $i . '</a></li>';
            }
        }

        #Về sau 1 trang
        # Nếu trang hiện tại nhỏ hơn tổng số trang => về sau
        if ($page < $sumPage) {
            $html .= '<li class="page-item"><a class="page-link" href="' . \App\Helpers\Helper::getFilter(['page' => ($page + 1)]) . '">Sau</a></li>';
        }

        #Về cuối trang
        $html .= '<li class="page-item"><a class="page-link" href="' . \App\Helpers\Helper::getFilter(['page' => $sumPage]) . '">Cuối</a></li>
        </ul>';

        return $html;
    }
}

if (!function_exists('pageHome')) {
    function pageHome($sumPage, $page)
    {
        $html = '';
        for ($i = 1; $i <= $sumPage; $i++) {
            if ($page == $i) {
                $html .= '<a href="' . \App\Helpers\Helper::getFilter(['page' => $i]) . '" class="item-pagination flex-c-m trans-0-4 active-pagination">' . $i . '</a>';
            } else {
                $html .= '<a href="' . \App\Helpers\Helper::getFilter(['page' => $i]) . '" class="item-pagination flex-c-m trans-0-4">' . $i . '</a>';
            }
        }

        return $html;
    }
}