namespace PersonalMvc.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class Personal : DbMigration
    {
        public override void Up()
        {
            AddColumn("dbo.Products", "PersonalId", c => c.Int());
            CreateIndex("dbo.Products", "PersonalId");
            AddForeignKey("dbo.Products", "PersonalId", "dbo.Personals", "Id");
        }
        
        public override void Down()
        {
            DropForeignKey("dbo.Products", "PersonalId", "dbo.Personals");
            DropIndex("dbo.Products", new[] { "PersonalId" });
            DropColumn("dbo.Products", "PersonalId");
        }
    }
}
