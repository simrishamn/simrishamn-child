<?php

namespace Simrishamn\Theme;

/**
 * A hierachical representation of all the pages on the site.
 */
class PageHierarchy
{
    private $rootPages;

    /**
     * Creates a PageHierarchy object.
     */
    public function __construct()
    {
        $this->rootPages = $this->generatePageHierarchy();
    }

    /**
     * Get the page hierarchy array.
     *
     * @return array An array of pages
     *   + title (string) - The title of the page
     *   + ID (int) - The ID of the page
     *   + uri (string) - The URI to the page
     *   + sub_pages (array) - All sub pages to this page (continuation of this array structure)
     *   + has_sub_pages (bool) - True if there are any sub pages to this page
     */
    public function getArray(): array
    {
        return $this->rootPages;
    }

    private function generatePageHierarchy(?int $forPageID = null, ?\ArrayIterator $pagesArrayIterator = null): array
    {
        $pages = array();
        $pagesArrayIterator = $pagesArrayIterator ?? new \ArrayIterator(get_pages());
        $pagesArrayIterator->next();

        while ($this->morePagesToAdd($pagesArrayIterator, $forPageID))
        {
            $pages[] = $this->getPage($pagesArrayIterator);
        }

        return $pages;
    }

    private function morePagesToAdd(\ArrayIterator $pagesArrayIterator, ?int $shouldHaveParentID): bool
    {
        $validParent = !is_int($shouldHaveParentID) ||
            $pagesArrayIterator->current()->post_parent === $shouldHaveParentID;

        return $pagesArrayIterator->valid() && $validParent;
    }

    private function getPage(\ArrayIterator $pagesArrayIterator): array
    {
        $currentPage = $pagesArrayIterator->current();
        $subPages = $this->generatePageHierarchy($currentPage->ID, $pagesArrayIterator);

        return array(
            "title" => $currentPage->post_title,
            "ID" => $currentPage->ID,
            "uri" => get_page_uri($currentPage->ID),
            "sub_pages" => $subPages,
            "has_sub_pages" => sizeof($subPages) > 0
        );
    }
}
