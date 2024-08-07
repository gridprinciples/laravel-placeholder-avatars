<?php

namespace GridPrinciples\PlaceholderAvatars\Tests;

use GridPrinciples\PlaceholderAvatars\View\Components\Beam;

class ComponentTest extends TestCase
{
    public function test_blade_component_can_be_rendered()
    {
        $svg = (new Beam)->render()->render();

        $this->assertStringStartsWith('<svg', $svg);
    }

    public function test_avatar_is_rendered_via_route()
    {
        $response = $this->get('test-avatar');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'image/svg+xml');
    }
}
