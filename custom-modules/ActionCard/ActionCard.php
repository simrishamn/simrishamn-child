<?php

namespace Simrishamn\ActionCard;

class ActionCard extends \Modularity\Module
{
    public $slug = 'action-card';
    public $hideTitle = true;
    public $supports = array();

    public function init()
    {
        $this->nameSingular = __('ActionCard', 'modularity');
        $this->namePlural = __('ActionCards', 'modularity');
        $this->description = __(
            'Index-like cards with configurable FontAwesome icons and no excerpt.',
            'modularity'
        );

        add_filter(
            'acf/fields/post_object/query/key=field_action-card',
            array($this, 'postObjectQuery'),
            10,
            3
        );
    }

    public function data() : array
    {
        $data = array();
        $data['classes'] = implode(
            ' ',
            apply_filters(
                'Modularity/Module/Classes',
                array('box', 'box-index', 'box-action'),
                $this->post_type,
                $this->args
            )
        );

        $data['columnClass'] = 'grid-md-2';
        if (!empty(get_field('action_columns', $this->ID))) {
            $data['columnClass'] = get_field('action_columns', $this->ID);
        }

        $data['items'] = $this->prepareItems(get_field('action-card', $this->ID));
        return $data;
    }

    public function prepareItems($items)
    {
        if (is_array($items) && !empty($items)) {
            foreach ($items as $key => &$item) {
                $postData = is_object($item['page']) ? $item['page'] : false;

                if ($item['link_type'] == 'external') {
                    $item['permalink'] = $item['link_url'];
                } elseif ($postData && isset($postData->ID)) {
                    $item['permalink'] = get_permalink($postData->ID);
                }

                if ($postData && get_post_status($postData->ID)) {
                    $item['title'] = $this->switchContent($item['title'], $postData->post_title);
                } else {
                    unset($item);
                }
            }
        }
        return $items;
    }

    /**
     * Return results from certain post types
     * @param  array $args    the WP_Query args used to find choices
     * @param  array $field   the field array containing all attributes & settings
     * @param  int   $post_id the current post ID being edited
     * @return array          updated WP_Query args
     */
    public function postObjectQuery($args, $field, $post_id)
    {
        $post_types = array('post', 'page');

        $custom_post_types = get_field('avabile_dynamic_post_types', 'option');
        if (is_array($custom_post_types) && !empty($custom_post_types)) {
            foreach ($custom_post_types as $post_type) {
                $post_types[] = sanitize_title(substr($post_type['post_type_name'], 0, 19));
            }
        }

        $args['post_type'] = $post_types;
        return $args;
    }

    /**
     * Enter a two value, if prefered value is empty. Use second value.
     * @param  [string] $preferdValue       [The value preferd to output]
     * @param [string] $secondaryValue     [The secondary fallback value]
     * @return [string] [One of the values above]
     */
    public function switchContent($preferdValue, $secondaryValue)
    {
        if (!empty($preferdValue)) {
            return $preferdValue;
        }
        return $secondaryValue;
    }

    /**
     * Available "magic" methods for modules:
     * init()            What to do on initialization
     * data()            Use to send data to view (return array)
     * style()           Enqueue style only when module is used on page
     * script            Enqueue script only when module is used on page
     * adminEnqueue()    Enqueue scripts for the module edit/add page in admin
     * template()        Return the view template (blade) the module should use when displayed
     */
}