<?php
/**
 * Created by PhpStorm.
 * User: Slava
 * Date: 31.05.2017
 * Time: 4:43
 */

namespace TripSorter;


use TripSorter\Mapper\Ticket;

class Render {

    /**
     * @param Ticket\AbstractBase $ticket
     * @return string
     * @throws \Exception
     */
    public function renderTicket(Ticket\AbstractBase $ticket) {
        $mapperRenderers = $this->_mapperToRenderer();
        if (array_key_exists(get_class($ticket), $mapperRenderers)) {
            /** @var Renderer\AbstractBase $mapperRenderer */
            $mapperRenderer = new $mapperRenderers[get_class($ticket)];
            return $mapperRenderer->renderTicket($ticket);
        } else {
            throw new \Exception("No renderer found for ticket " . get_class($ticket));
        }
    }

    /**
     * @return array
     */
    private function _mapperToRenderer() {
        return [
            Ticket\Air::class => Renderer\Air::class,
            Ticket\Bus::class => Renderer\Bus::class,
            Ticket\Train::class => Renderer\Train::class,
        ];
    }
}