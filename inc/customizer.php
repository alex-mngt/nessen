<?php



add_action('customize_register', 'cd_customizer_settings');
function cd_customizer_settings($wp_customize)
{

    // Variables to clean settings array 
    $front_page_data_explication = "C'est le nombre de réfugiés climatiques d'ici à 2050 si la hausse des températures est maintenue sous le cap des 2°C. Face à ces enjeux majeurs, les mégalopoles ne peuvent se permettre de rester sans agir ! Pour le futur de notre planète, agissons ensemble et faisons de Paris un exemple international. En respectant des normes d'urbanisation responsables, en mettant en avant des initatives sociales et se sensibilisant a un mode de vie durable, Paris pourrait devenir d'ici 2030 la première mégalopole mondiale au bilan carbone neutre.";

    $settings = [
        "front-page" => [
            "title" => "Page d'accueil",
            "priority" => 10,
            "active_callback" => "",
            "settings" => [
                "front_page_slogan" => [
                    "default" => "Faisons de Paris la première Eco-City !",
                    "transport" => "refresh",
                    "sanitize_callback" => "sanitize_slogan",
                    "control" => [
                        "type" => "text",
                        "priority" => 10,
                        "description" => "Slogan qui apparaitra dans la première section",
                        "input_attrs" => ""
                    ],
                ],
                "front_page_chiffre" => [
                    "default" => "280",
                    "transport" => "refresh",
                    "sanitize_callback" => "",
                    "control" => [
                        "type" => "text",
                        "priority" => 11,
                        "description" => "Donnée numérique qui apparaitra dans la deuxième section",
                        "input_attrs" => ""
                    ],
                ],
                "front_page_unit" => [
                    "default" => "Millions",
                    "transport" => "refresh",
                    "sanitize_callback" => "",
                    "control" => [
                        "type" => "text",
                        "priority" => 12,
                        "description" => "Unité associée à la donnée numérique ci-dessus",
                        "input_attrs" => ""
                    ],
                ],
                "front_page_data_explanation" => [
                    "default" => $front_page_data_explication,
                    "transport" => "refresh",
                    "sanitize_callback" => "",
                    "control" => [
                        "type" => "textarea",
                        "priority" => 13,
                        "description" => "Texte explicatif associé à la donnée numérique ci-dessus",
                        "input_attrs" => ""
                    ],
                ]
            ],
        ]
    ];

    function setupCustomizer($settings, $customizer)
    {
        foreach ($settings as $section_slug => $section_config) {
            $customizer->add_section($section_slug, [
                "title"    => $section_config["title"],
                "priority"   => $section_config["priority"],
                "active_callback" => $section_config["active_callback"]
            ]);

            foreach ($section_config["settings"] as $setting_slug => $setting_config) {
                $customizer->add_setting($setting_slug, [
                    "default"     => $setting_config["default"],
                    "transport"   => $setting_config["transport"],
                    "sanitize_callback" => $setting_config["sanitize_callback"]
                ]);

                $customizer->add_control($setting_slug, [
                    "type" => $setting_config["control"]["type"],
                    "priority" => $setting_config["control"]["priority"],
                    "description" => $setting_config["control"]["description"],
                    "section" => $section_slug,
                ]);
            }
        }
    }
    setupCustomizer($settings, $wp_customize);
}

function sanitize_slogan($input)
{
    $input_length = str_word_count($input);
    $word_array = str_word_count($input, 1);
    $input = "";
    for ($i = 0; $i <= 2; $i++) {
        $input = $input . " " . $word_array[$i];
    }
    $substring = "";
    for ($i = 3; $i < $input_length; $i++) {
        $substring = $substring . " " . $word_array[$i];
    }
    $input = $input . "<br><span>" . $substring . "</span>";
    return $input;
}
