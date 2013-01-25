<!-- Block Partners module -->
<!--
/*
 * Module ......: blockpartners
 * File ........: blockpartners.tpl
 * Description .: Simple Prestashop Module to publish partners logo on template
 * Authot ......: Luis Machado Reis <luis.reis@singularideas.com.br>
 * Licence .....: GNU Lesser General Public License V3
 * Created .....: 01/09/2010
 */
-->
<div id="tags_block_left" class="block tags_block">
	<h4>{l s='Partners' mod='blockpartners'}</h4>
	<p class="block_content" style="text-align:right">
    {if $partner_1_name and $partner_1_url and $partner_1_logo}
		<a href="{$partner_1_url}" title="{$partner_1_name}" target="_blank"><img src="{$partner_1_logo}" alt="{$partner_1_name}" border="0"/></a>
    {/if}
    {if $partner_2_name and $partner_2_url and $partner_2_logo}
		&nbsp;
		<a href="{$partner_2_url}" title="{$partner_2_name}" target="_blank"><img src="{$partner_2_logo}" alt="{$partner_2_name}" border="0"/></a>
    {/if}
    {if $partner_3_name and $partner_3_url and $partner_3_logo}
		&nbsp;
		<a href="{$partner_3_url}" title="{$partner_3_name}" target="_blank"><img src="{$partner_3_logo}" alt="{$partner_3_name}" border="0"/></a>
    {/if}
    {if $partner_4_name and $partner_4_url and $partner_4_logo}
		&nbsp;
		<a href="{$partner_4_url}" title="{$partner_4_name}" target="_blank"><img src="{$partner_4_logo}" alt="{$partner_4_name}" border="0"/></a>
    {/if}
	</p>
</div>
<!-- /Block Partners module -->
