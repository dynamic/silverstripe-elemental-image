<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>

<% if $Image %>
        <div class="col-md-12 card">
            <img src="$Image.URL" class="img-fluid card-img-top" alt="<% if $Image.Title %>$Image.Title.ATT<% else %>$Title.ATT<% end_if %>">
        </div>
<% end_if %>
