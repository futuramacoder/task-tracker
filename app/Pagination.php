<?php


namespace App;


class Pagination
{
    private int $totalPages;

    private int $currentPage;

    private array $data;

    /**
     * Pagination constructor.
     * @param int $totalPages
     * @param int $currentPage
     * @param array $data
     */
    public function __construct(int $totalPages, int $currentPage, array $data)
    {
        $this->totalPages = $totalPages;
        $this->currentPage = $currentPage;
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}