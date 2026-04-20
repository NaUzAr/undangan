import sys

try:
    with open('d:/undangan nikahan mba fira/src/resources/views/ngunduh-mantu.blade.php', 'r', encoding='utf-8') as f:
        content = f.read()

    # Color changes
    content = content.replace('#7B4E48', '#1A4331')
    content = content.replace('#5a3a36', '#0C2E1F')
    content = content.replace('#C89091', '#3E7755')
    content = content.replace('#E9D0CB', '#A6C4B1')
    content = content.replace('#DDB2B1', '#87A892')
    
    # Tailwind classes replacements
    content = content.replace('bg-merah-tua', 'bg-[#1A4331]')
    content = content.replace('text-merah-tua', 'text-[#1A4331]')
    content = content.replace('focus:ring-merah-tua', 'focus:ring-[#1A4331]')
    content = content.replace('focus:border-merah-tua', 'focus:border-[#1A4331]')
    content = content.replace('bg-merah-sedang', 'bg-[#3E7755]')
    content = content.replace('text-merah-sedang', 'text-[#3E7755]')

    # Add hidden input for event_type in RSVP and Wishes
    content = content.replace('<form action=\"{{ route(\'rsvp.store\') }}\" method=\"POST\" class=\"space-y-4\">\\n                        @csrf', '<form action=\"{{ route(\'rsvp.store\') }}\" method=\"POST\" class=\"space-y-4\">\\n                        @csrf\\n                        <input type=\"hidden\" name=\"event_type\" value=\"ngunduh_mantu\">')
    
    content = content.replace('<form action=\"{{ route(\'wishes.store\') }}\" method=\"POST\" enctype=\"multipart/form-data\"\\n                    class=\"space-y-4\">\\n                    @csrf', '<form action=\"{{ route(\'wishes.store\') }}\" method=\"POST\" enctype=\"multipart/form-data\"\\n                    class=\"space-y-4\">\\n                    @csrf\\n                    <input type=\"hidden\" name=\"event_type\" value=\"ngunduh_mantu\">')
    
    with open('d:/undangan nikahan mba fira/src/resources/views/ngunduh-mantu.blade.php', 'w', encoding='utf-8') as f:
        f.write(content)
        
    print('Replacements done.')
except Exception as e:
    print('Failed:', e)
