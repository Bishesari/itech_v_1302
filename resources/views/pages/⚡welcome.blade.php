<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Layout('layouts.public')]
#[Title('آموزشگاه کامپیوتر، حسابداری، معماری و عکاسی در بوشهر | دوره‌های مهارتی')]
class extends Component
{
    //
};
?>

<flux:main container>
    <flux:heading size="xl" level="1">Good afternoon, Olivia</flux:heading>
    <flux:text class="mt-2 mb-6 text-base">Here's what's new today</flux:text>
    <flux:separator variant="subtle" />
</flux:main>
