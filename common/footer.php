    </div><!--end id="wrap"-->
    <p class="footer11px">
    <?php
    $exhibit = get_current_record('exhibit', false);
    if ($exhibit) {
      $title = metadata('exhibit','title');
    }
    else {
      // if exhibit is undefined in this context, just set $title to empty string
      $title = '';
    }
    // strcmp returns 0 if strings are equal
if ( !strcmp($title,"Comics in the Curriculum") ):
    ?>
  <p class="footer11px">Digital Humanities Center  / 305 Butler Library  / 535 West 114th St. / New York, NY 10027 / (212) 854-7547 / <a href="mailto:dhc@libraries.cul.columbia.edu">dhc@libraries.cul.columbia.edu</a>
     </p>
<?php else: ?>
     <p class="footer11px">
      Columbia University Libraries Digital Program Division
    </p>
	<?php endif; ?>
    <div class="copyright-footer"> 
      <?php echo cul_copyright_information();?>
    </div>

    <!-- CULTNBW START -->
    <script type="text/javascript">
      <!-- 
        CULh_style = 'staticlink'; // staticlink, static, search, standard (default)
        //CULh_width = ''; // fixed, fluid (default)
        //CULh_colorfg = '#333333'; // topnavbar foreground color. hex value. ex: #002B7F
        //CULh_colorbg = '#666666'; // topnavbar background color. hex value. ex: #779BC3
        //CULh_nobs = 1; // uncomment to NOT load our bootstrap javascript file and or use your own (v2.3.x required)
        //CULh_notk = 1; // uncomment to NOT load our ldpd-toolkit.js and or use your own.
      //-->
    </script>
    <script src="//ldpd.cul.columbia.edu/ldpd-toolkit/build/js/jquery-1.7.2.min.js"></script>
    <script src="//ldpd.cul.columbia.edu/ldpd-toolkit/widgets/cultnbw.min.js"></script>
    <!-- /CULTNBW END -->
  </body>
</html>
