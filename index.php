<?php get_header(); ?>

<div class="scroll-indicator"></div>

<section class="home">
    <div class="home-content">
        <div class="intro">
            <h1>HELLO! I AM</h1>
            <h1><?php echo esc_html(get_theme_mod('portfolio_name', 'NIÑO ESPE')); ?></h1>
        </div>
        <p><?php echo esc_html(get_theme_mod('portfolio_description', 'An IT Student and I create graphic design, websites, website designs, apps. Take a look at my work and feel free to reach out if you would like to collaborate!')); ?></p>
        <div class="social-icons">
            <a href="<?php echo esc_url(get_theme_mod('youtube_url', 'https://www.youtube.com/@espenino5785')); ?>"><i class="fa-brands fa-youtube"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('github_url', 'https://github.com/neo156')); ?>"><i class="fa-brands fa-github"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('instagram_url', 'https://www.instagram.com/nee_o15/')); ?>"><i class="fa-brands fa-instagram"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('facebook_url', 'https://web.facebook.com/nino.espe.750')); ?>"><i class="fa-brands fa-facebook"></i></a>
        </div>
        <a href="mailto:<?php echo esc_attr(get_theme_mod('email', 'ninoespe01@gmail.com')); ?>" class="btn">CONTACT ME</a>
    </div>

    <div class="home-img">
        <img src="<?php echo esc_url(get_theme_mod('profile_image', get_template_directory_uri() . '/images/logo.png')); ?>" alt="Logo">
    </div>
</section>

<!-- Recent Works Section -->
<section class="recent-works">
    <h2>Recent Works</h2>
    <div class="carousel-container">
        <div class="carousel-track">
            <?php
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            
            $portfolio_query = new WP_Query($args);
            
            if ($portfolio_query->have_posts()) :
                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
            ?>
                <div class="carousel-slide">
                    <div class="work-box">
                        <div class="image-pair">
                            <?php 
                            $images = get_post_meta(get_the_ID(), 'project_images', true);
                            if (!empty($images)) :
                                $images_array = is_array($images) ? $images : explode(',', $images);
                                foreach (array_slice($images_array, 0, 2) as $image) : 
                            ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <?php 
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="project-info">
                            <h3><?php the_title(); ?></h3>
                            <p class="project-description"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="no-projects">
                    <p>No portfolio items found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="carousel-dots"></div>
</section>

<!-- Education Section -->
<section class="schools">
    <h1 class="myedu">My Education</h1>
    <div class="boxess">
        <div class="coloum">
            <div class="edu">
                <div class="year-level">
                    <h2>2010-2016</h2>
                    <h1>Elementary School</h1>
                    <p>Looc Pt. Linao Elementary School</p>
                </div>
            </div>
            <div class="edu">
                <div class="year-level">
                    <h2>2016-2020</h2>
                    <h1>Junior High School</h1>
                    <p>Puntalinao National High School</p>
                </div>
            </div>
        </div>
        <div class="coloum">
            <div class="edu">
                <div class="year-level">
                    <h2>2020-2022</h2>
                    <h1>Senior High School</h1>
                    <p>Puntalinao National High School</p>
                </div>
            </div>
            <div class="edu">
                <div class="year-level">
                    <h2>2022-Ongoing</h2>
                    <h1>College</h1>
                    <p>Davao Oriental State University</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section class="skills-section">
    <h1>My Skills</h1>
    <p>As a Student of Davao Oriental State University these are the skills I gained</p>
    <div class="skills-container">
        <div class="skill">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/figma.png'); ?>" alt="Figma">
            <p>92%</p>
            <h3>Figma</h3>
        </div>
        <div class="skill">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/java.svg'); ?>" alt="Java">
            <p>80%</p>
            <h3>Java</h3>
        </div>
        <div class="skill">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/html.png'); ?>" alt="HTML">
            <p>85%</p>
            <h3>HTML</h3>
        </div>
        <div class="skill">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/wordpress.png'); ?>" alt="WordPress">
            <p>99%</p>
            <h3>WordPress</h3>
        </div>
        <div class="skill">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/react.png'); ?>" alt="React">
            <p>49%</p>
            <h3>React</h3>
        </div>
        <div class="skill">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/javascript.png'); ?>" alt="JavaScript">
            <p>93%</p>
            <h3>JavaScript</h3>
        </div>
    </div>
</section>

<?php get_footer(); ?> 