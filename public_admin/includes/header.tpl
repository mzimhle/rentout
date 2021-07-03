<div id="header">
    <!-- Start Heading -->
        
    <div id="heading">
        <div id="ct_logo">

        </div>
       
    </div><!-- End Heading -->
	 {if isset($administratorData)}
    <!-- Start Top Nav -->
    <div id="topnav"> 
            <ul>
                <li><a href="/" title="Home" {if $page eq 'default.php' or $page eq ''} class="active"{/if}>Home</a></li>
				<li><a href="/participant/" title="Participants" {if $page eq 'participant'} class="active"{/if}>Participants</a></li>			
				<li><a href="/car/" title="Car" {if $page eq 'car'} class="active"{/if}>Car</a></li>
				<li><a href="/brand/" title="Brand" {if $page eq 'brand'} class="active"{/if}>Brand</a></li>				
				<li><a href="/group/" title="Group" {if $page eq 'group'} class="active"{/if}>Group</a></li>
				<li><a href="/booking/" title="Booking" {if $page eq 'booking'} class="active"{/if}>Booking</a></li>
            </ul>
    </div><!-- End Top Nav -->
  <div class="clearer"><!-- --></div>
  {/if}
</div><!--header-->
{if isset($administratorData)}
    <div class="logged_in">
        <ul>
            <li><a href="/logout.php" title="Logout">Logout</a></li>
        </ul>
    </div><!--logged_in-->
	{/if}
  	<br />