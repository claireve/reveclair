<?php // Script 13.9 -edit_quote.php
define('TITLE', 'Afficher un post');?>

  <div class="row">
    <div class="large-9 columns aside">

<?php 
include(DB);

if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) 
{
	$query = "SELECT title,entry FROM entries WHERE entry_id={$_GET['id']}";
	if ($r = mysql_query($query, $dbc)) { $row = mysql_fetch_array($r);


print '<h2>'.$row[0].'</h2>';
}
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
