      <?php
        echo head(array('title' => metadata('exhibit', 'title'),
			'bodyclass'=>'exhibits summary')); 
      ?>
      <div id="exhibit-nav">
        <ul class="exhibit-section-nav" style="padding:0; margin:0">
          <li>
            <?php
              $title = exhibit_builder_link_to_exhibit(get_current_record('exhibit'),
						       "Home",
						       array('style' => 'font-weight:bold;'));
              echo $title;
            ?>
          </li>
        </ul>
        <ul class="exhibit-section-nav">
          <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
          <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
            <?php 
              $html = '<li>' . '<a class="exhibit-section-list" href="' . 
                      exhibit_builder_exhibit_uri(get_current_record('exhibit'), 
						  $exhibitPage) . '">' .
                      cul_insert_angle_brackets(metadata($exhibitPage, 'title')) . '</a></li>';
              echo $html;
            ?>
          <?php endforeach; ?>
        </ul>
      </div> <!--end id="exhibit-nav"-->
      <div id="content">
        <?php echo flash(); ?>
        <div id="solidBlock">
          <table style="border-collapse:collapse">
            <tr>
              <td style="border-right:5px solid #fff;vertical-align:middle;padding:10px;width:380px">
                <h1>
                  <?php
                    $title = exhibit_builder_link_to_exhibit($exhibit);
                    $matches = explode(":",$title,2);
                  ?>
                  <?php
                    if (!is_null($matches[0]))
                      echo $matches[0];
                  ?>
                  <span style="text-transform:none;font-size:24px">
                    <?php 
                      if ((count($matches) == 2)
			  &&
                          (!is_null($matches[1])))
                        echo ":<br />" . $matches[1];
                    ?>
                  </span>
                </h1>
              </td>
              <td>
                <?php
                  $uri = exhibit_builder_link_to_exhibit();
                  $bannerImage = '';
                  $href = "";
                  $resolverURL = '';
                  // Original comment: TEMPORARY UNTIL I FIND A BETTER SOLTN
                  if (stristr($uri, 'stokes')) {
                    $bannerImage = "stokes1.jpg";
                    $resolverURL = 'http://www.columbia.edu/cgi-bin/cul/resolve?lweb0138';
                  }
                  else if (stristr($uri, 'historical_nyc')) {
                    $bannerImage = "stokes1.jpg";
                    $resolverURL = '';
                  }
                  else if (stristr($uri, 'comics')) {
                    $bannerImage = "cc-1.jpg";
                    $resolverURL = 'http://www.columbia.edu/cgi-bin/cul/resolve?clio7992131';
                  }
                ?>
                <?php 
                  if ($href != "")
                    echo '<a href="' . $href . '">';
                ?>
                <img src="<?=img($bannerImage)?>" alt="<?php echo metadata('exhibit','title');?>">
                <?php if ($href != "")
                  echo "</a>";
                ?>
              </td>
            </tr>
          </table>
        </div> <!--end id="solidBlock"-->
        <div class="exhibit-description">
          <?php echo $exhibit->description; ?>
        </div>
        <div id="exhibit-credits">	
          <h3>Exhibit Curator</h3>
          <?php echo $exhibit->credits; ?>
        </div>
        <div id="exhibit-sections">
          <?php if (!stristr($uri,'plimpton')): ?>
            <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
            <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
              <?php 
                $html = '<h3><a href="' . 
                        exhibit_builder_exhibit_uri(get_current_record('exhibit'), 
						    $exhibitPage) . '">'.
                        cul_insert_angle_brackets(metadata($exhibitPage, 'title')) .
                        '&raquo;</a></h3>';
                echo $html;
                // fcd1, 01/08/15:
                // function exhibit_builder_page_text(), available in plugin Exhibit Builder version 2.1.1,
                // has been removed from Exhibit Builder 3.1.1, which is the version bundled with Omeka 2.2.2 .
                // Exhibit Builder 3.1.1 uses content blocks.
                $pageBlocks = $exhibitPage->getPageBlocks();
                $textBlock = $pageBlocks[0];
                echo $textBlock->text;
              ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div> <!--end id="solidBlock"-->
        <?php if ($resolverURL != ""): ?>
          <div style="float:right;font-style:italic">
            <p>Bookmark this page as: <a href="<?php echo $resolverURL;?>"><?=$resolverURL;?></a></p>
          </div>
        <?php endif; ?>
      </div> <!--end id="content"-->
    <?php echo foot(); ?>

