<?php
namespace Common;

class Datatable {

    static function schemaStatic($dataData, $args)
    {
        $output = array(
            'id' => isset($dataData[$args['id']]) ? $dataData[$args['id']] : '',
            'text' => array(),
        );

        if (is_array($args['text'])) {
            foreach ($args['text'] as $t) {
                if (isset($dataData[$t]) && !empty($dataData[$t])) {
                    $output['text'][] = $dataData[$t];
                }
            }
            $output['text'] = implode(' - ', $output['text']);
        } else {
            if (isset($dataData[$args['text']]) && !empty($dataData[$args['text']])) {
                $output['text'] = $dataData[$args['text']];
            }
        }

        return $output;
    }
}