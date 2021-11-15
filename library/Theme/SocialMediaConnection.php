<?php
namespace Simrishamn\Theme;

class SocialMediaConnection
{
    const FACEBOOK_VERIFICATION_CODE_KEY = 'social_media_facebook_verification_code';
    const GTM_KEY_KEY = 'social_media_gtm_key';

    public function __construct()
    {

        $this->addOptionsPanel();
        $this->addFacebookVerification();
        $this->addGTMKey();
    }

    private function addOptionsPanel() {
        if (function_exists('\acf_add_local_field_group')) {

            \acf_add_local_field_group([
                'key' => 'group_f6d87c1faa1c7cff33',
                'title' => 'Sociala medier',
                'fields' => [
                    0 => [
                        'key' => 'field_4dbf708a86d022420884',
                        'label' => 'Facebook verifikationskod',
                        'name' => SocialMediaConnection::FACEBOOK_VERIFICATION_CODE_KEY,
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => [
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ],
                        'message' => '',
                        'default_value' => '',
                        'ui' => 0,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                    ],
                    1 => [
                        'key' => 'field_765dbc6351d8d24286',
                        'label' => 'GTM-nyckel',
                        'name' => SocialMediaConnection::GTM_KEY_KEY,
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => [
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ],
                        'message' => '',
                        'default_value' => '',
                        'ui' => 0,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                    ],
                ],
                'location' => [
                    0 => [
                        0 => [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'acf-options-theme-options',
                        ],
                    ],
                ],
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            ]);
        }
    }

    private function addFacebookVerification() {
        $verificationCode = $this->getValue(SocialMediaConnection::FACEBOOK_VERIFICATION_CODE_KEY);
        if (!empty($verificationCode)) {
            add_action( 'wp_head', function () use ($verificationCode) {
                echo "<meta name=\"facebook-domain-verification\" content=\"$verificationCode\" />";
            });
        }
    }

    private function addGTMKey() {
        $key = $this->getValue(SocialMediaConnection::GTM_KEY_KEY);
        if (!empty($key)) {
            add_action( 'wp_head', function () use ($key) {
                echo <<<GTM
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push(
{'gtm.start': new Date().getTime(),event:'gtm.js'}
);var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','$key');</script>
<!-- End Google Tag Manager -->
GTM;
            });

            add_action( 'wp_body_open', function () use ($key) {
                echo <<<GTM
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=$key"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
GTM;
            });
        }
    }

    private function getValue($fieldName) {
        if (!function_exists('\acf_add_local_field_group')) {
            return false;
        }

        return \get_field($fieldName, 'options');
    }
}
