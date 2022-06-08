namespace PersonalMvc.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class Material : DbMigration
    {
        public override void Up()
        {
            CreateTable(
                "dbo.Materials",
                c => new
                    {
                        Id = c.Int(nullable: false, identity: true),
                        Name = c.String(),
                    })
                .PrimaryKey(t => t.Id);
            
            AddColumn("dbo.Products", "MaterialId", c => c.Int());
            CreateIndex("dbo.Products", "MaterialId");
            AddForeignKey("dbo.Products", "MaterialId", "dbo.Materials", "Id");
            DropColumn("dbo.Products", "Material");
        }
        
        public override void Down()
        {
            AddColumn("dbo.Products", "Material", c => c.String());
            DropForeignKey("dbo.Products", "MaterialId", "dbo.Materials");
            DropIndex("dbo.Products", new[] { "MaterialId" });
            DropColumn("dbo.Products", "MaterialId");
            DropTable("dbo.Materials");
        }
    }
}
