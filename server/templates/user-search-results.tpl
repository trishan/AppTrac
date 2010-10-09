{foreach from=$results item=user}
<a href="{$base}/student-view?username={$user.User_Name}">{$user.User_Name} ({$user.First_Name} {$user.Last_Name})</a><br/>
{/foreach}
({$results|@count} {if $results|@count == 1} match {else} matches {/if})