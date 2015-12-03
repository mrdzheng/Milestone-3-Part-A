USE `moocs160`;

CREATE TABLE IF NOT EXISTS `courses_taken` (
	`id` int NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255) NOT NULL,
	`course_id` int(5) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `course_id` (`course_id`)
);

ALTER TABLE `courses_taken`
  ADD CONSTRAINT `course_taken_fk_1` FOREIGN KEY (`course_id`) REFERENCES `course_data` (`id`);

INSERT INTO `courses_taken` (`username`, `course_id`) VALUES ('slee', '1');
INSERT INTO `courses_taken` (`username`, `course_id`) VALUES ('slee', '2');
INSERT INTO `courses_taken` (`username`, `course_id`) VALUES ('slee', '3');