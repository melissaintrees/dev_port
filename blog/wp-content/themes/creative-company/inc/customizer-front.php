<?php

// ----------Panel For Home/Front Option ----------

$wp_customize->add_panel( 'creative_company_front_option', array(
 'priority' => 10,
 'capability'     => 'edit_theme_options',
 'title' => __( 'Home/Front Page Options', 'creative-company' ),
 'description' => __( 'Front Page Options', 'creative-company' ),
) );	

// ---------Page Section ----------
$wp_customize->add_section( 'creative_company_page_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 20,
  'title'                 => __( 'Page Section', 'creative-company' ),
  'description'           => __( 'This  appear on top of the home page', 'creative-company' ),
  'panel'       => 'creative_company_front_option'
) );

//page selection
$wp_customize->add_setting( 'creative_company_page1', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_page1', array(
  'label'                 =>  __( 'Page Selection (First)', 'creative-company' ),
  'description'           =>  __('Select page for the top home page(Animated Area)', 'creative-company'),
  'section'               => 'creative_company_page_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 10,
  'settings'              => 'creative_company_page1',
) );
//To Add Animation Text On Home Page 
$wp_customize->add_setting(
    'creative_company_page_text', 
        array(
           'capability'            => 'edit_theme_options',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',

      )
);

$wp_customize->add_control(
    'creative_company_page_text',
        array(
          'type' => 'text',
          'label' => esc_html__( 'Page Banner Titles (Eg:-Creative Company, Business Consulting, Powerfull Template)', 'creative-company' ),
          'section' => 'creative_company_page_section',
          'priority' => 11
        )
);  
 
// ---------Features Section ----------
$wp_customize->add_section( 'creative_company_features_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 30,
  'title'                 => __( 'Features Section', 'creative-company' ),
  'description'           => __( 'Section Which Shows Features Just Below The Main Page', 'creative-company' ),
  'panel'                 => 'creative_company_front_option'
) );

//Features section Checkbox
$wp_customize->add_setting( 'creative_company_features_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'creative_company_features_enable', array(
  'label'                 =>  __( 'Enable Explore Destination', 'creative-company' ),
  'section'               => 'creative_company_features_section',
  'type'                  => 'checkbox',
  'priority'              => 5,
  'settings'              => 'creative_company_features_enable',
) );

//Features page selection
$wp_customize->add_setting( 'creative_company_features_page', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_features_page', array(
  'label'                 =>  __( 'Page Selection  (Features)', 'creative-company' ),
  'description'           =>  __('This section helps to get select pages.', 'creative-company'),
  'section'               => 'creative_company_features_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 10,
  'settings'              => 'creative_company_features_page',
) );

// Features page icon
$wp_customize->add_setting( 'creative_company_features_icon1', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'creative_company_features_icon1', array(
   'label'                 => __( 'Icon For Feature 1', 'creative-company' ),
  /* translators: %s: Description */ 
  'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
  'section'               => 'creative_company_features_section',
  'type'                  => 'text',
  'priority'              => 20,
  'settings' => 'creative_company_features_icon1',
) );

//Features page inner selection1
$wp_customize->add_setting( 'creative_company_features_page1', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_features_page1', array(
  'label'                 =>  __( 'Page Selection', 'creative-company' ),
  'description'           =>  __('This section helps to get select pages.', 'creative-company'),
  'section'               => 'creative_company_features_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 30,
  'settings'              => 'creative_company_features_page1',
) );

// Features page icon
$wp_customize->add_setting( 'creative_company_features_icon2', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'creative_company_features_icon2', array(
  'label'                 => __( 'Icon For Feature 2', 'creative-company' ),
  /* translators: %s: Description */ 
  'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
  'section'               => 'creative_company_features_section',
  'type'                  => 'text',
  'priority'              => 40,
  'settings' => 'creative_company_features_icon2',
) );

//Features page inner selection2
$wp_customize->add_setting( 'creative_company_features_page2', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_features_page2', array(
  'label'                 =>  __( 'Page Selection', 'creative-company' ),
  'description'           =>  __('This section helps to get select pages.', 'creative-company'),
  'section'               => 'creative_company_features_section',
  'type'                  => 'dropdown-pages',
  'priority'              =>50,
  'settings'              => 'creative_company_features_page2',
) );

// Features page icon
$wp_customize->add_setting( 'creative_company_features_icon3', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'creative_company_features_icon3', array(
   'label'                 => __( 'Icon For Feature 3', 'creative-company' ),
  /* translators: %s: Description */ 
  'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
  'section'               => 'creative_company_features_section',
  'type'                  => 'text',
  'priority'              => 60,
  'settings' => 'creative_company_features_icon3',
) );

//Features page inner selection3
$wp_customize->add_setting( 'creative_company_features_page3', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_features_page3', array(
  'label'                 =>  __( 'Page Selection', 'creative-company' ),
  'description'           =>  __('This section helps to get select pages.', 'creative-company'),
  'section'               => 'creative_company_features_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 70,
  'settings'              => 'creative_company_features_page3',
) );

// Features page icon
$wp_customize->add_setting( 'creative_company_features_icon4', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'creative_company_features_icon4', array(
  'label'                 => __( 'Icon For Feature 4', 'creative-company' ),
  /* translators: %s: Description */ 
  'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
  'section'               => 'creative_company_features_section',
  'type'                  => 'text',
  'priority'              => 80,
  'settings' => 'creative_company_features_icon4',
) );

//Features page inner selection4
$wp_customize->add_setting( 'creative_company_features_page4', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_features_page4', array(
  'label'                 =>  __( 'Page Selection', 'creative-company' ),
  'description'           =>  __('This section helps to get select pages.', 'creative-company'),
  'section'               => 'creative_company_features_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 90,
  'settings'              => 'creative_company_features_page4',
) );


// ---------Exclusive Services ----------
$wp_customize->add_section( 'creative_company_exclusive_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 40,
  'title'                 => __( 'Exclusive Section', 'creative-company' ),
  'description'           => __( 'Section Which Shows Exclusive Service Section', 'creative-company' ),
  'panel'                 => 'creative_company_front_option'
) );

//Exclusive Checkbox
$wp_customize->add_setting( 'creative_company_exclusive_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'creative_company_exclusive_enable', array(
  'label'                 =>  __( 'Enable Exclusive Services', 'creative-company' ),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'checkbox',
  'priority'              => 5,
  'settings'              => 'creative_company_exclusive_enable',
) );

//Exclusive selection
$wp_customize->add_setting( 'creative_company_exclusive_page', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_exclusive_page', array(
  'label'                 =>  __( 'Page Selection  (Exclusive Services)', 'creative-company' ),
  'description'           =>  __('This section helps to get select pages.', 'creative-company'),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 10,
  'settings'              => 'creative_company_exclusive_page',
) );

 //Exclusive Services Icon
$wp_customize->add_setting( 'creative_company_exclusive_icon1', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'creative_company_exclusive_icon1', array(
  'label'                 => __( 'Icon For Exculsive 1', 'creative-company' ),
  /* translators: %s: Description */ 
  'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'text',
  'priority'              => 15,
  'settings' => 'creative_company_exclusive_icon1',
) );

//Exclusive Services Page
$wp_customize->add_setting( 'creative_company_exclusive_page1', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_exclusive_page1', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 20,
  'settings'              => 'creative_company_exclusive_page1',
) );

 //Exclusive Services Icon
$wp_customize->add_setting( 'creative_company_exclusive_icon2', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'creative_company_exclusive_icon2', array(
 'label'                 => __( 'Icon For Exculsive 2', 'creative-company' ),
  /* translators: %s: Description */ 
  'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'text',
  'priority'              => 25,
  'settings' => 'creative_company_exclusive_icon2',
) );

//Exclusive Services Page
$wp_customize->add_setting( 'creative_company_exclusive_page2', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_exclusive_page2', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 30,
  'settings'              => 'creative_company_exclusive_page2',
) );

 //Exclusive Services Icon
$wp_customize->add_setting( 'creative_company_exclusive_icon3', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'creative_company_exclusive_icon3', array(
  'label'                 => __( 'Icon For Exculsive 3', 'creative-company' ),
  /* translators: %s: Description */ 
  'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'text',
  'priority'              => 35,
  'settings' => 'creative_company_exclusive_icon3',
) );

//Exclusive Services Page
$wp_customize->add_setting( 'creative_company_exclusive_page3', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_exclusive_page3', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 40,
  'settings'              => 'creative_company_exclusive_page3',
) );

 //Exclusive Services Icon
$wp_customize->add_setting( 'creative_company_exclusive_icon4', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'creative_company_exclusive_icon4', array(
  'label'                 => __( 'Icon For Exculsive 4', 'creative-company' ),
  /* translators: %s: Description */ 
  'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'text',
  'priority'              => 45,
  'settings' => 'creative_company_exclusive_icon4',
) );

//Exclusive Services Page
$wp_customize->add_setting( 'creative_company_exclusive_page4', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_exclusive_page4', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 50,
  'settings'              => 'creative_company_exclusive_page4',
) );

 //Exclusive Services Icon
$wp_customize->add_setting( 'creative_company_exclusive_icon5', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'creative_company_exclusive_icon5', array(
  'label'                 => __( 'Icon For Exculsive 5', 'creative-company' ),
  /* translators: %s: Description */ 
  'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'text',
  'priority'              => 55,
  'settings' => 'creative_company_exclusive_icon5',
) );

//Exclusive Services Page
$wp_customize->add_setting( 'creative_company_exclusive_page5', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_exclusive_page5', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 60,
  'settings'              => 'creative_company_exclusive_page5',
) );

 //Exclusive Services Icon
$wp_customize->add_setting( 'creative_company_exclusive_icon6', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'creative_company_exclusive_icon6', array(
  'label'                 => __( 'Icon For Exculsive 6', 'creative-company' ),
  /* translators: %s: Description */ 
  'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'text',
  'priority'              => 65,
  'settings' => 'creative_company_exclusive_icon6',
) );

//Exclusive Services Page
$wp_customize->add_setting( 'creative_company_exclusive_page6', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_exclusive_page6', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_exclusive_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 70,
  'settings'              => 'creative_company_exclusive_page6',
) );

// ---------Works Section ----------
$wp_customize->add_section( 'creative_company_works_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 50,
  'title'                 => __( 'Works Section', 'creative-company' ),
  'description'           => __( 'Section Which Shows Works Section', 'creative-company' ),
  'panel'                 => 'creative_company_front_option'
) );

//Exclusive Checkbox
$wp_customize->add_setting( 'creative_company_work_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'creative_company_work_enable', array(
  'label'                 =>  __( 'Enable Work Section', 'creative-company' ),
  'section'               => 'creative_company_works_section',
  'type'                  => 'checkbox',
  'priority'              => 5,
  'settings'              => 'creative_company_work_enable',
) );

//Work Page
$wp_customize->add_setting( 'creative_company_work_page1', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_work_page1', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_works_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 10,
  'settings'              => 'creative_company_work_page1',
) );

//Work List Category list
$wp_customize->add_setting('creative_company_work_section_category',array(
                    'default'           =>  '0',
                    'sanitize_callback' =>  'creative_company_sanitize_category_select',
                    )
                );
$wp_customize->add_control(
                'creative_company_work_section_category',array(
                    'priority'      =>  20,
                    'label'         =>  esc_html__('Select main category having subcategories','creative-company'),
                    'section'       =>  'creative_company_works_section',
                    'setting'       =>  'creative_company_work_section_category',
                    'type'          =>  'select',
                    'choices'       =>  $creative_company_category_lists
                    )
                );
// --------Testimonial Section -----------
$wp_customize->add_section( 'creative_company_testimonial_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 55,
  'title'                 => __( 'Testimonial Section', 'creative-company' ),
  'description'           => __( 'Section Which Shows Testimonial Section On Home Page', 'creative-company' ),
  'panel'                 => 'creative_company_front_option'
) );

//Testimonial Checkbox
$wp_customize->add_setting( 'creative_company_testimonial_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'creative_company_testimonial_enable', array(
  'label'                 =>  __( 'Enable Testimonial Section', 'creative-company' ),
  'section'               => 'creative_company_testimonial_section',
  'type'                  => 'checkbox',
  'priority'              => 5,
  'settings'              => 'creative_company_testimonial_enable',
) );

// Testimonial Section Category List
$wp_customize->add_setting('creative_company_testimonial_section_category',array(
                    'default'           =>  '0',
                    'sanitize_callback' =>  'creative_company_sanitize_category_select',
                    )
                );
$wp_customize->add_control(
                'creative_company_testimonial_section_category',array(
                    'priority'      =>  20,
                    'label'         =>  esc_html__('Select category','creative-company'),
                    'section'       =>  'creative_company_testimonial_section',
                    'setting'       =>  'creative_company_testimonial_section_category',
                    'type'          =>  'select',
                    'choices'       =>  $creative_company_category_lists
                    )
                );
// ---------News Section ----------
$wp_customize->add_section( 'creative_company_news_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 60,
  'title'                 => __( 'News Section', 'creative-company' ),
  'description'           => __( 'Section Which Show News Section On Home Page', 'creative-company' ),
  'panel'                 => 'creative_company_front_option'
) );

//News Checkbox
$wp_customize->add_setting( 'creative_company_news_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'creative_company_news_enable', array(
  'label'                 =>  __( 'Enable News Section', 'creative-company' ),
  'section'               => 'creative_company_news_section',
  'type'                  => 'checkbox',
  'priority'              => 5,
  'settings'              => 'creative_company_news_enable',
) );

//News Page
$wp_customize->add_setting( 'creative_company_news_page1', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_news_page1', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_news_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 10,
  'settings'              => 'creative_company_news_page1',
) );

// News Section Category List
$wp_customize->add_setting('creative_company_news_section_category',array(
                    'default'           =>  '0',
                    'sanitize_callback' =>  'creative_company_sanitize_category_select',
                    )
                );
$wp_customize->add_control(
                'creative_company_news_section_category',array(
                    'priority'      =>  20,
                    'label'         =>  esc_html__('Select category','creative-company'),
                    'section'       =>  'creative_company_news_section',
                    'setting'       =>  'creative_company_news_section_category',
                    'type'          =>  'select',
                    'choices'       =>  $creative_company_category_lists
                    )
                );
  // ---------- Counter Section -----------------
$wp_customize->add_section( 'create_company_counter',
  array(
    'title'      => esc_html__( 'Counter Section', 'creative-company' ),
    'description'           => __( 'Section Which Show Counter Section On Home Page', 'creative-company' ),
    'priority'   => 70,
    'capability' => 'edit_theme_options',
    'panel'      => 'creative_company_front_option',
  )
);

//News Checkbox
$wp_customize->add_setting( 'create_company_counter_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'create_company_counter_enable', array(
  'label'                 =>  __( 'Enable Counter Section', 'creative-company' ),
  'section'               => 'create_company_counter',
  'type'                  => 'checkbox',
  'priority'              => 5,
  'settings'              => 'create_company_counter_enable',
) );

$counter_no = 4;
for( $i = 1; $i <= $counter_no; $i++ ) {

  $creative_company_icon = 'creative_company_icon_' . $i;
  $creative_company_number = 'creative_company_number_' . $i;
  $creative_company_title = 'creative_company_title_' . $i;

    // Counter Icon
  $wp_customize->add_setting( $creative_company_icon,
    array(
      'default'           => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control( $creative_company_icon,
    array(
       'label'                 => esc_html__( 'Counter Icon ', 'creative-company' ).$i,
      /* translators: %s: Description */ 
      'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-question','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
      'section'       => 'create_company_counter',
      'type'          => 'text',
      'priority'      => 10,
    )
  );

    // Counter Number
  $wp_customize->add_setting( $creative_company_number,
    array(
      'default'           => '',
      'sanitize_callback' => 'creative_company_sanitize_number_absint',
    )
  );

  $wp_customize->add_control( $creative_company_number,
    array(
      'label'         => esc_html__( 'Counter Number ', 'creative-company' ).$i,
      'section'       => 'create_company_counter',
      'type'          => 'text',
      'priority'      => 10,
    )
  );

    // Counter Title
  $wp_customize->add_setting( $creative_company_title,
    array(
      'default'           => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control( $creative_company_title,
    array(
      'label'         => esc_html__( 'Counter Title ', 'creative-company' ).$i,
      'section'       => 'create_company_counter',
      'type'          => 'text',
      'priority'      => 10,
    )
  );

}

// ---------Team Section ----------
$wp_customize->add_section( 'creative_company_team_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 70,
  'title'                 => __( 'Team Section', 'creative-company' ),
  'description'           => __( 'Section Which Shows Team Section On Home Page', 'creative-company' ),
  'panel'                 => 'creative_company_front_option'
) );

//Team Checkbox
$wp_customize->add_setting( 'creative_company_team_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'creative_company_team_enable', array(
  'label'                 =>  __( 'Enable Team Section', 'creative-company' ),
  'section'               => 'creative_company_team_section',
  'type'                  => 'checkbox',
  'priority'              => 1,
  'settings'              => 'creative_company_team_enable',
) );

//Team Page
$wp_customize->add_setting( 'creative_company_team_page', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_team_page', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_team_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 5,
  'settings'              => 'creative_company_team_page',
) );
// News Section Category List
$wp_customize->add_setting('creative_company_team_section_category',array(
                    'default'           =>  '0',
                    'sanitize_callback' =>  'creative_company_sanitize_category_select',
                    )
                );
$wp_customize->add_control(
                'creative_company_team_section_category',array(
                    'priority'      =>  20,
                    'label'         =>  esc_html__('Select category','creative-company'),
                    'section'       =>  'creative_company_team_section',
                    'setting'       =>  'creative_company_team_section_category',
                    'type'          =>  'select',
                    'choices'       =>  $creative_company_category_lists
                    )
                );
// ---------Table Section ----------
$wp_customize->add_section( 'creative_company_table_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 80,
  'title'                 => __( 'Table Section', 'creative-company' ),
  'description'           => __( 'Section Which Shows Table Section On Home Page', 'creative-company' ),
  'panel'                 => 'creative_company_front_option'
) );

//Table Checkbox
$wp_customize->add_setting( 'creative_company_table_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'creative_company_table_enable', array(
  'label'                 =>  __( 'Enable Table Section', 'creative-company' ),
  'section'               => 'creative_company_table_section',
  'type'                  => 'checkbox',
  'priority'              => 5,
  'settings'              => 'creative_company_table_enable',
) );

//Table Page
$wp_customize->add_setting( 'creative_company_table_page', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_table_page', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_table_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 10,
  'settings'              => 'creative_company_table_page',
) );

// ---------Contact Section ----------
$wp_customize->add_section( 'creative_company_contact_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 90,
  'title'                 => __( 'Contact Section', 'creative-company' ),
  'description'           => __( ' Section Which Shows Contact Section on Home Page', 'creative-company' ),
  'panel'                 => 'creative_company_front_option'
) );

//Contact Checkbox
$wp_customize->add_setting( 'creative_company_contact_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'creative_company_contact_enable', array(
  'label'                 =>  __( 'Enable Contact Section', 'creative-company' ),
  'section'               => 'creative_company_contact_section',
  'type'                  => 'checkbox',
  'priority'              => 5,
  'settings'              => 'creative_company_contact_enable',
) );
//Contact Page
$wp_customize->add_setting( 'creative_company_contact_page', array(
  'capability'            => 'edit_theme_options',
  'default'               => '',
  'sanitize_callback'     => 'creative_company_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'creative_company_contact_page', array(
  'label'                 =>  __( 'Page Selection ', 'creative-company' ),
  'section'               => 'creative_company_contact_section',
  'type'                  => 'dropdown-pages',
  'priority'              => 10,
  'settings'              => 'creative_company_contact_page',
) );
$wp_customize->add_setting('creative_comapny_form_shortcode',array(
    'default'       =>      '',
    'sanitize_callback'     =>  'sanitize_text_field'
    ));
  $wp_customize->add_control('creative_comapny_form_shortcode',array(
    'section'       =>      'creative_company_contact_section',
    'label'         =>      __('Contact Form Shortcode', 'creative-company'),
    'description'         =>      __('Add form shortcode e.g. [contact-form-7 id="237" title="Untitled"]', 'creative-company'),
    'type'          =>      'text'
    ));

$wp_customize->add_section( 'creative_company_brand_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 90,
  'title'                 => __( 'Brand Logo Section', 'creative-company' ),
  'description'           => __( ' This Enable Brand Logo Section On Home Page', 'creative-company' ),
  'panel'                 => 'creative_company_front_option'
) );

//Brand Logo Checkbox
$wp_customize->add_setting( 'creative_company_brand_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'creative_company_brand_enable', array(
  'label'                 =>  esc_html__( 'Enable Brand Logo Section', 'creative-company' ),
  'section'               => 'creative_company_brand_section',
  'type'                  => 'checkbox',
  'priority'              => 5,
  'settings'              => 'creative_company_brand_enable',
) );

// Brand Logo Category list
$wp_customize->add_setting('creative_company_brand_section_category',array(
                    'default'           =>  '0',
                    'sanitize_callback' =>  'creative_company_sanitize_category_select',
                    )
                );
$wp_customize->add_control(
                'creative_company_brand_section_category',array(
                    'priority'      =>  20,
                    'label'         =>  esc_html__('Select category','creative-company'),
                    'section'       =>  'creative_company_brand_section',
                    'setting'       =>  'creative_company_brand_section_category',
                    'type'          =>  'select',
                    'choices'       =>  $creative_company_category_lists
                    )
                );

// ---------Social Media Section ----------
$wp_customize->add_section( 'creative_company_social_section', array(
  'capability'            => 'edit_theme_options',
  'priority'              => 110,
  'title'                 => __( 'Social Media Section', 'creative-company' ),
  'description'           => __( 'This Enable Social Media On Home Page', 'creative-company' ),
  'panel'                 => 'creative_company_front_option'
) );

//Social Media Checkbox
$wp_customize->add_setting( 'creative_company_social_enable', array(
  'capability'            => 'edit_theme_options',
  'default'               => 0,
  'sanitize_callback'     => 'creative_company_sanitize_checkbox'
) );

$wp_customize->add_control( 'creative_company_social_enable', array(
  'label'                 =>  __( 'Enable Social Media Section', 'creative-company' ),
  'section'               => 'creative_company_social_section',
  'type'                  => 'checkbox',
  'priority'              => 5,
  'settings'              => 'creative_company_social_enable',
) );


$total_media = 5;
for( $i = 1; $i <= $total_media; $i++ ) {

  $creative_company_social_icon = 'creative_company_social_icon_' . $i;
  $creative_company_social_url = 'creative_company_social_url_' . $i;


    // Social Media Icon
  $wp_customize->add_setting( $creative_company_social_icon,
    array(
      'default'           => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control( $creative_company_social_icon,
    array(
      'label'         => esc_html__( 'Social Media Icon ', 'creative-company' ).$i,
    /* translators: %s: Description */ 
    'description'           => sprintf( __( 'Use font awesome icon: Eg:%1$s. %2$s See more here %3$s', 'creative-company' ), 'fa fa-facebook','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
      'section'       => 'creative_company_social_section',
      'type'          => 'text',
      'priority'      => 10,
    )
  );
      // Social Media Icon
  $wp_customize->add_setting( $creative_company_social_url,
    array(
      'default'           => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );

  $wp_customize->add_control( $creative_company_social_url,
    array(
      'label'         => esc_html__( 'Social Media Url ', 'creative-company' ).$i,
      'description'     => esc_html__( 'Add Url Of Social Media', 'creative-company' ),
      'section'       => 'creative_company_social_section',
      'type'          => 'url',
      'priority'      => 10,
    )
  );
}

?>