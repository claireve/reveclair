<?php // Script 13.9 -edit_quote.php
require_once 'ressources/php_markdown_lib_1.4.1/Michelf/Markdown.inc.php';?>
<div class="wrapper">
  <div class="row">
    <div class="large-9 columns aside">
<?php 
include(DB);
if (isset($_GET['slug']) && ($_GET['slug'] != null)) 
{
	$query = "SELECT e.entry_id, e.title,e.entry,c.name, c.id FROM entries e LEFT JOIN Category c ON e.category_id = c.id WHERE e.slug='{$_GET['slug']}'";
	if ($r = mysqli_query($dbc, $query)) { 
        $row = mysqli_fetch_array($r);
        $text = \Michelf\Markdown::defaultTransform($row[2]);
        print '<h1 class="page-title">Blog - '.$row[3].'</h1><div class=\'panel single-post\'><h1>'.$row[1].'</h1><p>'.$text.'</p></div>';
        $page_title = $row[1];
        if (isset($_SESSION['valid_user'])){
            print "<a href=\"/index.php?p=edit_category&id={$row['id']}\">Modifier la catégorie</a>
            <a href=\"/index.php?p=edit_entry&id={$row['entry_id']}\">Edit</a>";


        }
    }
    else echo 'bla';
}
?>
<div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'reveclair'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

</div>
<div class="large-3 columns">
<?php include('templates/blog_sidenav.html'); ?>
</div>
</div>
<div class="push"></div>
</div>
<script language="javascript">
   $(document).ready(function() {
        $(this).attr("title", $(".single-post h1").text());
    });
</script>
