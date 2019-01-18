# phpBB Extension - marttiphpbb Calendar Mono

[Topic on phpbb.com](https://www.phpbb.com/community/viewtopic.php?f=456&t=2487151)

## Description

This phpBB extension is part of the [Calendar Extension Set](doc/calendar-set.md) and provides storage for a single Calendar Events for each topic.
Internally the dates are stored as [Julian Day Count](http://php.net/manual/en/ref.calendar.php).

## Requirements

* phpBB 3.2.1+
* PHP 7.1+
* PHP calendar extension (PHP compiled with --enable-calendar)

When it's not possible for you to have PHP compiled with --enable-calendar see the [PHP Ext Calendar extension](https://github.com/marttiphpbb/phpbb-ext-phpextcalendar) for a solution.

## Quick Install

You can install this on the latest release of phpBB 3.2 by following the steps below:

* Create `marttiphpbb/calendarmono` in the `ext` directory.
* Download and unpack the repository into `ext/marttiphpbb/calendarmono`
* Enable `Calendar Mono` in the ACP at `Customise -> Manage extensions`.

## Uninstall

* Disable `Calendar Mono` in the ACP at `Customise -> Extension Management -> Extensions`.
* To permanently uninstall, click `Delete Data`. Optionally delete the `/ext/marttiphpbb/calendarmono` directory.

## Support

* Report bugs and other issues to the [Issue Tracker](https://github.com/marttiphpbb/phpbb-ext-calendarmono/issues).

## License

[GPL-2.0](license.txt)

## Screenshots

This extension doesn't produce anything visual directly.
