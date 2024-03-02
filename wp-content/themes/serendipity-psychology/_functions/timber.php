<?php 

  $autoload = dirname(__DIR__) . '/vendor/autoload.php';
  if( file_exists( $autoload ) ) :
    require_once( $autoload );
    new Timber\Timber();
  endif;

  if( !class_exists( 'Timber' ) ) :
    add_action( 'admin_notices', function() {
      echo "<div class=\"error\"><p>Timber does not appear to be available. Check composer install</p></div>";
    });
  endif;

  // Some Timber setup
  Timber::$dirname = array( '_views', '_components' );

  class newSite extends Timber\Site {
    
    /** Add timber support. */
    public function __construct() {
      add_action( 'after_setup_theme', array( $this, 'themeSupports' ) );
      add_filter( 'timber/context', array( $this, 'addToContext' ) );
      parent::__construct();
      $this->timberRoutes();
    }

    function add_to_twig( $twig ) {
        // Adding a function.
        $twig->addFunction( new Timber\Twig_Function( 'address_stacked', 'address_stacked' ) );        
        return $twig;
    }
    
    /** This is where you add some context
     *
     * @param string $context context['this'] Being the Twig's {{ this }}.
     */
    public function addToContext( $context )
    {
      // Menus
      $context['site'] = $this;
      $context['options'] = get_fields('option');
      $context['primaryMenu'] = new Timber\Menu('Primary Menu');
      // Check if the secondary nav menu location has a menu assigned to it
      if( has_nav_menu( 'secondary' ) ) {
        $context['secondaryMenu'] = new Timber\Menu('Secondary Menu');
      }
      $context['footerMenu'] = new Timber\Menu('Footer Menu');

      $carePathways = [
          'post_type' => 'care-pathways',
          'orderby' => 'title',
          'order' => 'ASC',
          'posts_per_page' => -1,
      ];
      $context['carePathways'] = new Timber\PostQuery($carePathways);

      $specialistTherapies = [
          'post_type' => 'specialist-therapies',
          'orderby' => 'title',
          'order' => 'ASC',
          'posts_per_page' => -1,
      ];
      $context['specialistTherapies'] = new Timber\PostQuery($specialistTherapies);

      $conditions = [
        'post_type' => 'conditions',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
    ];
    $context['conditions'] = new Timber\PostQuery($conditions);

    $testimonials = [
        'post_type' => 'testimonials',
        'posts_per_page' => 10,
    ];
    $context['testimonials'] = new Timber\PostQuery($testimonials);

      $context['spacingY'] = 'py-12 lg:py-16 2xl:py-20';
      $context['spacingT'] = 'pt-12 lg:pt-16 2xl:pt-20';
      $context['spacingB'] = 'pb-12 lg:pb-16 2xl:pb-20';
      $context['spacingX'] = 'px-4 2xs:px-6 md:px-8 lg:px-6 xl:px-10';

      return $context;
    }

    public function themeSupports() {
      add_theme_support( 'post-thumbnails' );
      add_theme_support( 'menus' );
    }	
  }

new newSite();
