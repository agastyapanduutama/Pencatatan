<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Page
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        
    }

    public function page($total)
    {

        $this->ci->load->library('pagination');
        $config = array(
            'base_url' => base_url('admin/transaksi'),
            'total_rows' => $total,
            'per_page' => 9,
            'page_query_string' => true,
            // 'reuse_query_string' => true,
            'first_link' => 'Awal',
            'last_link' => 'Akhir',
            'next_link' => '>',
            'prev_link' => '<',
            'full_tag_open' => '<div class="pagging text-center"><nav><ul class="pagination justify-content-center link-secondary">',
            'full_tag_close' => '</ul></nav></div>',
            'num_tag_open' => '<li class="page-item"><span class="page-link">',
            'num_tag_close' => '</span></li>',
            'cur_tag_open' =>  '<li class="page-item active"><span class="page-link">',
            'cur_tag_close' => '<span class="sr-only">(Sedang Dibuka)</span></span></li>',
            'next_tag_open' => '<li class="page-item"><span class="page-link">',
            'next_tagl_close' => '<span aria-hidden="true">&raquo;</span></span></li>',
            'prev_tag_open' => '<li class="page-item"><span class="page-link">',
            'prev_tagl_close' => '</span>Next</li>',
            'first_tag_open' => '<li class="page-item"><span class="page-link">',
            'first_tagl_close' => '</span></li>',
            'last_tag_open' => '<li class="page-item"><span class="page-link">',
            'last_tagl_close' =>  '</span></li>',
        );

        return $this->ci->pagination->initialize($config);
    }

    public function pageCari($total, $key)
    {

        $this->ci->load->library('pagination');
        $config = array(
            'base_url' => base_url("wisata/cari?cari=$key"),
            'total_rows' => $total,
            'per_page' => 9,
            'display_pages' => FALSE,
            'page_query_string' => true,
            // 'reuse_query_string' => true,
            'first_link' => 'Awal',
            'last_link' => 'Akhir',
            'next_link' => '>',
            'prev_link' => '<',
            'full_tag_open' => '<div class="pagging text-center"><nav><ul class="pagination justify-content-center link-secondary">',
            'full_tag_close' => '</ul></nav></div>',
            'num_tag_open' => '<li class="page-item"><span class="page-link">',
            'num_tag_close' => '</span></li>',
            'cur_tag_open' =>  '<li class="page-item active"><span class="page-link">',
            'cur_tag_close' => '<span class="sr-only">(Sedang Dibuka)</span></span></li>',
            'next_tag_open' => '<li class="page-item"><span class="page-link">',
            'next_tagl_close' => '<span aria-hidden="true">&raquo;</span></span></li>',
            'prev_tag_open' => '<li class="page-item"><span class="page-link">',
            'prev_tagl_close' => '</span>Next</li>',
            'first_tag_open' => '<li class="page-item"><span class="page-link">',
            'first_tagl_close' => '</span></li>',
            'last_tag_open' => '<li class="page-item"><span class="page-link">',
            'last_tagl_close' =>  '</span></li>',
        );

        return $this->ci->pagination->initialize($config);
    }

    public function pageRating($slug,$total)
    {

        $this->ci->load->library('pagination');
        $config = array(
            'base_url' => base_url("wisata/detail/$slug?rating"),
            'total_rows' => $total,
            'per_page' => 9,
            'page_query_string' => true,
            // 'reuse_query_string' => true,
            'first_link' => 'Awal',
            'last_link' => 'Akhir',
            'next_link' => '>',
            'prev_link' => '<',
            'full_tag_open' => '<div class="pagging text-center"><nav><ul class="pagination justify-content-center link-secondary">',
            'full_tag_close' => '</ul></nav></div>',
            'num_tag_open' => '<li class="page-item"><span class="page-link">',
            'num_tag_close' => '</span></li>',
            'cur_tag_open' =>  '<li class="page-item active"><span class="page-link">',
            'cur_tag_close' => '<span class="sr-only">(Sedang Dibuka)</span></span></li>',
            'next_tag_open' => '<li class="page-item"><span class="page-link">',
            'next_tagl_close' => '<span aria-hidden="true">&raquo;</span></span></li>',
            'prev_tag_open' => '<li class="page-item"><span class="page-link">',
            'prev_tagl_close' => '</span>Next</li>',
            'first_tag_open' => '<li class="page-item"><span class="page-link">',
            'first_tagl_close' => '</span></li>',
            'last_tag_open' => '<li class="page-item"><span class="page-link">',
            'last_tagl_close' =>  '</span></li>',
        );

        return $this->ci->pagination->initialize($config);
    }

    

}

/* End of file Page.php */
