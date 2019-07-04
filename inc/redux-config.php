<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_theme";
    
    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Redux Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Redux Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    

    /********** CUSTOM BASIC FIELD ****************/

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Fields', 'redux-framework-demo' ),
        'id'               => 'header',
        'desc'             => __( 'These are really basic fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    
   
    

    Redux::setSection( $opt_name, array(
        'title'            => __( 'The Header', 'redux-framework-demo' ),
        'desc'             => __( 'Here you can put in all your header details'),
        'id'               => 'header-Text',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'text_email',
                'type'     => 'text',
                'title'    => __( 'Email', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your email', 'redux-framework-demo' ),
                'default'  => 'info@lorieleung.com',
            ),
             array(
                'id'       => 'text_phone',
                'type'     => 'text',
                'title'    => __( 'Phone', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your phone number', 'redux-framework-demo' ),
                'default'  => '(123) 456-7890',
            ),
             array(
                'id'       => 'header_facebook',
                'type'     => 'text',
                'title'    => __( 'Facebook', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your facebook link', 'redux-framework-demo' ),
                'default'  => '#',
            ),
             array(
                'id'       => 'header_twitter',
                'type'     => 'text',
                'title'    => __( 'Twitter', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your twitter link', 'redux-framework-demo' ),
                'default'  => '#',
            ),
             array(
                'id'       => 'header_google',
                'type'     => 'text',
                'title'    => __( 'Google', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your google link', 'redux-framework-demo' ),
                'default'  => '#',
            ),
             array(
                'id'       => 'header_linkedin',
                'type'     => 'text',
                'title'    => __( 'Linkedin', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your linkedin link', 'redux-framework-demo' ),
                'default'  => '#',
            ),
             array(
                'id'       => 'header_youtube',
                'type'     => 'text',
                'title'    => __( 'Youtube', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your youtube link', 'redux-framework-demo' ),
                'default'  => '#',
            )
          
          

        )
    ) );

    // -> START Footer Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Fields', 'redux-framework-demo' ),
        'id'               => 'footer',
        'desc'             => __( 'These are really footer fields!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-bulb'
    ) );

    
   
    

    Redux::setSection( $opt_name, array(
        'title'            => __( 'The Footer', 'redux-framework-demo' ),
        'desc'             => __( 'Here you can put in all your footer details'),
        'id'               => 'footer-Text',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'text_contact',
                'type'     => 'text',
                'title'    => __( 'Contact', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your contact form shortcode', 'redux-framework-demo' ),
                'default'  => 'info@lorieleung.com',
            ),
             array(
                'id'       => 'footer_street',
                'type'     => 'text',
                'title'    => __( 'Address', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your address', 'redux-framework-demo' ),
                'default'  => '10 Fake Street Ave.',
            ),
             array(
                'id'       => 'footer_phone',
                'type'     => 'text',
                'title'    => __( 'Phone', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your phone', 'redux-framework-demo' ),
                'default'  => '(123) 456-7890',
            ),
             array(
                'id'       => 'footer_website',
                'type'     => 'text',
                'title'    => __( 'Website', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your website link', 'redux-framework-demo' ),
                'default'  => 'lorieleung.com',
            ),
             array(
                'id'       => 'footer_email',
                'type'     => 'text',
                'title'    => __( 'Email', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your email', 'redux-framework-demo' ),
                'default'  => 'info@lorieleung.com',
            )),

        Redux::setSection( $opt_name, array(
        'title'            => __( 'Information Section', 'redux-framework-demo' ),
        'desc'             => __( 'Here you can put in all your footer details'),
        'id'               => 'footer-Text-2',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'text_contact_2',
                'type'     => 'text',
                'title'    => __( 'Contact', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your contact form shortcode', 'redux-framework-demo' ),
                'default'  => '',
            )
    ) )),

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Bottom Section', 'redux-framework-demo' ),
        'desc'             => __( 'Here you can put in all your footer details'),
        'id'               => 'footer-Text-3',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'text_bottom',
                'type'     => 'text',
                'title'    => __( 'All rights reserved', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your text or leave it empty', 'redux-framework-demo' ),
                'default'  => 'All rights reserved 2019',
            )

        )))
    ) );

// Custom Switch

 // -> START Switch & Button Set
    Redux::setSection( $opt_name, array(
        'title' => __( 'Header Logo', 'redux-framework-demo' ),
        'id'    => 'switch_buttonset-1',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-cogs'
    ) );

    


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Logo', 'redux-framework-demo' ),
        'id'         => 'switch_buttonset-switch-1',
        'desc'       => __( 'Upload your logo'),
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'switch-parent-1',
                'type'     => 'switch',
                'title'    => __( 'Logo switcher', 'redux-framework-demo' ),
                'subtitle' => __( 'You can upload your logo', 'redux-framework-demo' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'opt-logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Logo upload', 'redux-framework-demo' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'You can upload your logo', 'redux-framework-demo' ),
                'subtitle' => __( 'Upload any media using the WordPress native uploader', 'redux-framework-demo' ),
                'required' => array( 'switch-parent-1', '=', '1' ),
                'default'  => array( 'url' => 'https://s.wordpress.org/style/images/codeispoetry.png' ),
            ),
            array(
                'id'       => 'text_icon',
                'type'     => 'text',
                'title'    => __( 'The icon for the logo', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your text or leave it empty', 'redux-framework-demo' ),
                'required' => array( 'switch-parent-1', '=', '0' ),
                'default'  => 'fa fa-university',
            ),
            array(
                'id'       => 'text_logo',
                'type'     => 'text',
                'title'    => __( 'The Logo text', 'redux-framework-demo' ),
                'desc'     => __( 'Put in your text or leave it empty', 'redux-framework-demo' ),
                'required' => array( 'switch-parent-1', '=', '0' ),
                'default'  => 'Varsity',
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Multi Text', 'redux-framework-demo' ),
        'id'         => 'basic-Multi Text',
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/multi-text/" target="_blank">docs.reduxframework.com/core/fields/multi-text/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-multitext',
                'type'     => 'multi_text',
                'title'    => __( 'Multi Text Option', 'redux-framework-demo' ),
                'subtitle' => __( 'Field subtitle', 'redux-framework-demo' ),
                'desc'     => __( 'Field Decription', 'redux-framework-demo' ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Password', 'redux-framework-demo' ),
        'id'         => 'basic-Password',
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/password/" target="_blank">docs.reduxframework.com/core/fields/password/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'password',
                'type'     => 'password',
                'username' => true,
                'title'    => 'Password Field',
                //'placeholder' => array(
                //    'username' => 'Username',
                //    'password' => 'Password',
                //)
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Textarea', 'redux-framework-demo' ),
        'id'         => 'basic-Textarea',
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/textarea/" target="_blank">docs.reduxframework.com/core/fields/textarea/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-textarea',
                'type'     => 'textarea',
                'title'    => __( 'Textarea Option - HTML Validated Custom', 'redux-framework-demo' ),
                'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                'default'  => 'Default Text',
            )
        )
    ) );

        


    // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'redux-framework-demo' ),
        'id'     => 'typography',
        'desc'   => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/typography/" target="_blank">docs.reduxframework.com/core/fields/typography/</a>',
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the body font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'output' => array('h1, h2, h3, h4'),
                'default'  => array(
                    'color'       => '#dd9933',
                    'font-size'   => '30px',
                    'font-family' => 'Arial,Helvetica,sans-serif',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'          => 'opt-typography',
                'type'        => 'typography',
                'title'       => __( 'Typography h2.site-description', 'redux-framework-demo' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                //'subsets'       => false, // Only appears if google is true and subsets not set to false
                //'font-size'     => false,
                //'line-height'   => false,
                //'word-spacing'  => true,  // Defaults to false
                //'letter-spacing'=> true,  // Defaults to false
                //'color'         => false,
                //'preview'       => false, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( '.site-description' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'site-description-compiler' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'redux-framework-demo' ),
                'default'     => array(
                    'color'       => '#333',
                    'font-style'  => '700',
                    'font-family' => 'Abel',
                    'google'      => true,
                    'font-size'   => '33px',
                    'line-height' => '40px'
                ),
            ),
        )
    ) );

    // -> START Additional Types
    Redux::setSection( $opt_name, array(
        'title' => __( 'Additional Types', 'redux-framework-demo' ),
        'id'    => 'additional',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-magic',
        //'fields' => array(
        //    array(
        //        'id'              => 'opt-customizer-only-in-section',
        //        'type'            => 'select',
        //        'title'           => __( 'Customizer Only Option', 'redux-framework-demo' ),
        //        'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'redux-framework-demo' ),
        //        'desc'            => __( 'The field desc is NOT visible in customizer.', 'redux-framework-demo' ),
        //        'customizer_only' => true,
        //        //Must provide key => value pairs for select options
        //        'options'         => array(
        //            '1' => 'Opt 1',
        //            '2' => 'Opt 2',
        //            '3' => 'Opt 3'
        //        ),
        //        'default'         => '2'
        //    ),
        //)
    ) );

    

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Sorter', 'redux-framework-demo' ),
        'id'         => 'additional-sorter',
        'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/sorter/" target="_blank">docs.reduxframework.com/core/fields/sorter/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-homepage-layout',
                'type'     => 'sorter',
                'title'    => 'Layout Manager Advanced',
                'subtitle' => 'You can add multiple drop areas or columns.',
                'compiler' => 'true',
                'options'  => array(
                    'enabled'  => array(
                        'slider'     => 'Slider',
                        'feature' => 'Feature',
                        'counter'     => 'Counter',
                        'about' => 'About',
                        'blog'   => 'Blog'
                    ),
                    'disabled' => array(),
                    'backup'   => array(),
                ),
               ),
        )

    ) );

       

    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'redux-framework-demo' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'redux-framework-demo' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'redux-framework-demo' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'redux-framework-demo' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'redux-framework-demo' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );

    
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

