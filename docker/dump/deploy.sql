DROP TABLE IF EXISTS "public"."sendmessage_messages_status";
CREATE TABLE "public"."sendmessage_messages_status" (
	"id" UUID UNIQUE PRIMARY KEY NOT NULL DEFAULT uuid_generate_v4(),
    "core_user_id" UUID NOT NULL,
	"phone_from" VARCHAR(50) NOT NULL,
	"phone_to" VARCHAR(50) NOT NULL,
	"last_message" TEXT NOT NULL,
	"photo_phone_to" VARCHAR(255),
	"archived" VARCHAR(1) NOT NULL DEFAULT '0',
	"favorited" VARCHAR(1) NOT NULL DEFAULT '0',
	"created_at" timestamp(6) NULL DEFAULT now(),
	"updated_at" timestamp(6) NULL DEFAULT now(),
    FOREIGN KEY (core_user_id) REFERENCES core_users(id)
);