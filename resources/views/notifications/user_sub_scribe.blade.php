<li>
    <a href="{{action("Notification@is_read",[$notification->id])}}">
        {{$notification->data['subScribe_at']['date']}}
    </a>
</li>