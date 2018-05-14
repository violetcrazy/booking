<?php
namespace Wp\Controller;


use Common\Datatable;
use Core\Controller\BaseController;

class AjaxController extends BaseController
{
    public function initialize()
    {
        parent::initialize();

        if (ENV == 'prod') {
            if (!$this->request->isAjax()) {
                $this->outputJSON(array(
                    'status' => 200,
                    'message' => 'Request not allow'
                ));
            }
        }

    }

    public function listAction()
    {

        define('DB_NAME', $this->config->db->dbname);
        define('DB_USER', $this->config->db->username);
        define('DB_PASSWORD', $this->config->db->password);
        require_once $this->config->path_wp_load;

        $page = $this->request->getQuery('page', array('striptags', 'int'), 0);
        $q = $this->request->getQuery('q', array('striptags', 'trim'), '');

        $product = new \WP_Query(array(
            'post_type' => 'product',
            'posts_per_page' => 30,
            's' => $q,
            'paged' => $page,
            'order' => 'DESC',
            'orderby' => 'relevance',
            'post_status' => 'publish'
        ));

        $output = array();
        $prod = array();

        if ($product->have_posts()) {
            foreach ($product->get_posts() as $prod) {
                $prod->meta = get_post_meta($prod->ID);

                $price = get_post_meta($prod->ID, '_regular_price', true);
                $price_sale = get_post_meta($prod->ID, '_sale_price', true);

                $item = array(
                    'id' => $prod->ID,
                    'image' => get_post_meta($prod->ID, '_sku', true) . ' ' .get_the_post_thumbnail_url($prod->ID),
                    'name' => $prod->post_title,
                    'sku' => get_post_meta($prod->ID, '_sku', true),
                    'price_old' => $price,
                    'price' => (int)($price_sale > 0) ? $price_sale : $price,
                    'flash_sale' => ($price_sale) > 0 ? true : false,
                    'url' => get_the_permalink($prod->ID),
                    'attrs' => get_post_meta($prod->ID, '_product_attributes', true)
                );

                $output[] = $item;
            }
        }

        $this->outputJSON(array(
            'status' => 200,
            'message' => 'Success.',
            'result' => $output
        ));
    }
}