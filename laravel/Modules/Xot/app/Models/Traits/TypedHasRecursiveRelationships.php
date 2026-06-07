<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships as VendorHasRecursiveRelationships;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Ancestors;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Bloodline;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Descendants;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestor;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\RootAncestorOrSelf;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Siblings;

/**
 * Wrapper trait that re-exposes the vendor recursive relationship helpers
 * with proper return types required by {@see Modules\Xot\Contracts\HasRecursiveRelationshipsContract}.
 */
trait TypedHasRecursiveRelationships
{
    use VendorHasRecursiveRelationships {
        getParentKeyName as protected vendorGetParentKeyName;
        getQualifiedParentKeyName as protected vendorGetQualifiedParentKeyName;
        getLocalKeyName as protected vendorGetLocalKeyName;
        getQualifiedLocalKeyName as protected vendorGetQualifiedLocalKeyName;
        getDepthName as protected vendorGetDepthName;
        getPathName as protected vendorGetPathName;
        getPathSeparator as protected vendorGetPathSeparator;
        getCustomPaths as protected vendorGetCustomPaths;
        getExpressionName as protected vendorGetExpressionName;
        ancestors as protected vendorAncestors;
        ancestorsAndSelf as protected vendorAncestorsAndSelf;
        bloodline as protected vendorBloodline;
        children as protected vendorChildren;
        childrenAndSelf as protected vendorChildrenAndSelf;
        descendants as protected vendorDescendants;
        descendantsAndSelf as protected vendorDescendantsAndSelf;
        parentAndSelf as protected vendorParentAndSelf;
        rootAncestor as protected vendorRootAncestor;
        rootAncestorOrSelf as protected vendorRootAncestorOrSelf;
        siblings as protected vendorSiblings;
        siblingsAndSelf as protected vendorSiblingsAndSelf;
        getFirstPathSegment as protected vendorGetFirstPathSegment;
        hasNestedPath as protected vendorHasNestedPath;
        isIntegerAttribute as protected vendorIsIntegerAttribute;
    }

    public function getParentKeyName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
=======
        /* @var string $value */
>>>>>>> dev
        return $this->vendorGetParentKeyName();
    }

    public function getQualifiedParentKeyName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
=======
        /* @var string $value */
>>>>>>> dev
        return $this->vendorGetQualifiedParentKeyName();
    }

    public function getLocalKeyName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
=======
        /* @var string $value */
>>>>>>> dev
        return $this->vendorGetLocalKeyName();
    }

    public function getQualifiedLocalKeyName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
=======
        /* @var string $value */
>>>>>>> dev
        return $this->vendorGetQualifiedLocalKeyName();
    }

    public function getDepthName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
=======
        /* @var string $value */
>>>>>>> dev
        return $this->vendorGetDepthName();
    }

    public function getPathName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
=======
        /* @var string $value */
>>>>>>> dev
        return $this->vendorGetPathName();
    }

    public function getPathSeparator(): string
    {
<<<<<<< HEAD
        /** @var string $value */
=======
        /* @var string $value */
>>>>>>> dev
        return $this->vendorGetPathSeparator();
    }

    /**
     * @return array<int|string, string>
     */
    public function getCustomPaths(): array
    {
<<<<<<< HEAD
        /** @var array<int|string, string> $paths */
=======
        /* @var array<int|string, string> $paths */
>>>>>>> dev
        return $this->vendorGetCustomPaths();
    }

    public function getExpressionName(): string
    {
<<<<<<< HEAD
        /** @var string $value */
=======
        /* @var string $value */
>>>>>>> dev
        return $this->vendorGetExpressionName();
    }

    public function ancestors(): Ancestors
    {
<<<<<<< HEAD
        /** @var Ancestors $relation */
=======
        /* @var Ancestors $relation */
>>>>>>> dev
        return $this->vendorAncestors();
    }

    public function ancestorsAndSelf(): Ancestors
    {
<<<<<<< HEAD
        /** @var Ancestors $relation */
=======
        /* @var Ancestors $relation */
>>>>>>> dev
        return $this->vendorAncestorsAndSelf();
    }

    public function bloodline(): Bloodline
    {
<<<<<<< HEAD
        /** @var Bloodline $relation */
=======
        /* @var Bloodline $relation */
>>>>>>> dev
        return $this->vendorBloodline();
    }

    public function children(): HasMany
    {
<<<<<<< HEAD
        /** @var HasMany $relation */
=======
        /* @var HasMany $relation */
>>>>>>> dev
        return $this->vendorChildren();
    }

    public function childrenAndSelf(): Descendants
    {
<<<<<<< HEAD
        /** @var Descendants $relation */
=======
        /* @var Descendants $relation */
>>>>>>> dev
        return $this->vendorChildrenAndSelf();
    }

    public function descendants(): Descendants
    {
<<<<<<< HEAD
        /** @var Descendants $relation */
=======
        /* @var Descendants $relation */
>>>>>>> dev
        return $this->vendorDescendants();
    }

    public function descendantsAndSelf(): Descendants
    {
<<<<<<< HEAD
        /** @var Descendants $relation */
=======
        /* @var Descendants $relation */
>>>>>>> dev
        return $this->vendorDescendantsAndSelf();
    }

    public function parent(): BelongsTo
    {
<<<<<<< HEAD
        /** @var BelongsTo $relation */
=======
        /* @var BelongsTo $relation */
>>>>>>> dev
        return $this->VendorHasRecursiveRelationships::parent();
    }

    public function parentAndSelf(): Ancestors
    {
<<<<<<< HEAD
        /** @var Ancestors $relation */
=======
        /* @var Ancestors $relation */
>>>>>>> dev
        return $this->vendorParentAndSelf();
    }

    public function rootAncestor(): RootAncestor
    {
<<<<<<< HEAD
        /** @var RootAncestor $relation */
=======
        /* @var RootAncestor $relation */
>>>>>>> dev
        return $this->vendorRootAncestor();
    }

    public function rootAncestorOrSelf(): RootAncestorOrSelf
    {
<<<<<<< HEAD
        /** @var RootAncestorOrSelf $relation */
=======
        /* @var RootAncestorOrSelf $relation */
>>>>>>> dev
        return $this->vendorRootAncestorOrSelf();
    }

    public function siblings(): Siblings
    {
<<<<<<< HEAD
        /** @var Siblings $relation */
=======
        /* @var Siblings $relation */
>>>>>>> dev
        return $this->vendorSiblings();
    }

    public function siblingsAndSelf(): Siblings
    {
<<<<<<< HEAD
        /** @var Siblings $relation */
=======
        /* @var Siblings $relation */
>>>>>>> dev
        return $this->vendorSiblingsAndSelf();
    }

    public function getFirstPathSegment(): string
    {
<<<<<<< HEAD
        /** @var string $value */
=======
        /* @var string $value */
>>>>>>> dev
        return $this->vendorGetFirstPathSegment();
    }

    public function hasNestedPath(): bool
    {
<<<<<<< HEAD
        /** @var bool $result */
=======
        /* @var bool $result */
>>>>>>> dev
        return $this->vendorHasNestedPath();
    }

    public function isIntegerAttribute(string $attribute): bool
    {
<<<<<<< HEAD
        /** @var bool $result */
=======
        /* @var bool $result */
>>>>>>> dev
        return $this->vendorIsIntegerAttribute($attribute);
    }
}
