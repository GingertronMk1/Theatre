# The Integrated Theatre System

Welcome to The Integrated Theatre System, a one-stop shop for all aspects of running a theatre.
Well, probably not *all* aspects, but that's the aim.
This is based on my experience as a member of the [Nottingham New Theatre](https://newtheatre.org.uk).


### Installation

Once downloaded, run the following commands (assuming you are on a Mac):

```
composer install
npm install
php vendor/bin/homestead make
```

Then check your `Homestead.yaml` file, make a note of the IP address denoted by the `ip` value, and ensure the following line is in your `/etc/hosts` file (using as an example the IP address 192.168.10.10):

```
{homestead_ip} theatre.test
```

Where `{homestead_ip}` is the IP address you noted.

Finally, run `vagrant up`.

### To-do list
- [x] Users
- [x] Groups
- [x] Training Items
- [x] Training Prerequisites
- [x] Training-User links (A `User` can be trained in `Training`s by other `User`s)
- [x] Training Sessions - A way of giving many `User`s many `Training`s at once
- [x] Shows
- [x] Roles
- [ ] Tickets

### Plan

- Training session is essentially just a form
    - A `<select>` at the top with the trainer
    - A set of checkboxes with all available `Training`s
    - A set of checkboxes with all available `User`s
- Show
    - `name` :: string
    - `description` :: medium text
    - hasMany `Role`s
- Roles
    - RoleShow: essentially a pivot table not dissimilar to the TrainingUser currently present
        - `user_id` :: integer - the user in the show
        - `show_id` :: integer - the show
        - `role_id` :: integer - the role, as defined below
    - Role
        - `name` :: string
        - `description` :: medium text
- Tickets
    - ShowInstance: as it appears
        - `show_id` :: integer
        - `curtain_up_time` :: dateTime
    - Ticket
        - `show_instance_id` :: integer
        - `contact_email` :: string
