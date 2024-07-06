<x-mail::message>
# E M S

Hello {{$user->name}},<br><br>
Your event has been deleted successfully. Here are the details:<br>
- **Title:** {{ $event->title }}
- **Date:** {{ $event->date }}
- **Location:** {{ $event->location }}


Thanks,<br>
{{'Event Management Authority'}}
</x-mail::message>